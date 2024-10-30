from typing import Annotated

from src.utils.settings import env

from fastapi import Depends

from sqlalchemy.ext.asyncio.engine import AsyncEngine
from sqlalchemy.orm import sessionmaker

from sqlmodel import SQLModel, create_engine
from sqlmodel.ext.asyncio.session import AsyncSession

CONNECTION = env("DB_CONNECTION")
DRIVER = env("DB_DRIVER")

HOST = env("DB_HOST")
PORT = env("DB_PORT")

DATABASE = env("DB_DATABASE")
USERNAME = env("DB_USERNAME")
PASSWORD = env("DB_PASSWORD")

if CONNECTION == "sqlite":
    db_url = f"{CONNECTION}+{DRIVER}:///{DATABASE}"
else:
    db_url = f"{CONNECTION}+{DRIVER}://{USERNAME}:{PASSWORD}@{HOST}:{PORT}/{DATABASE}"

connect_args = {}
engine = AsyncEngine(create_engine(db_url, connect_args=connect_args))

def get_url():
    return db_url

async def create_db_and_tables():
    async with engine.begin() as conn:
       await conn.run_sync(SQLModel.metadata.create_all)

async def get_session():
    async with AsyncSession(engine) as session:
        try:
            yield session
        finally:
            await session.close()
    
async def disconnect():
    await engine.dispose()

SessionDep = Annotated[AsyncSession, Depends(get_session)]