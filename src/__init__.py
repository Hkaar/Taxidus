from fastapi import FastAPI
from sqlalchemy import text
from sqlmodel import select

from src.utils.db import create_db_and_tables, SessionDep, disconnect

from src.app.routes import testRouter

app = FastAPI()

@app.on_event("startup")
async def startup():
    await create_db_and_tables()

@app.on_event("shutdown")
async def shutdown():
    await disconnect()

app.include_router(testRouter)

@app.get("/")
async def test_db(session: SessionDep):
    print(session)
    objs = await session.exec(select(text('id, name FROM users')))
    for i in objs.all():
        print(i)
    return objs.all()