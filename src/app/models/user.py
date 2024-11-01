from typing import Optional

from sqlalchemy import BigInteger, Column
from sqlmodel import SQLModel, Field

class User(SQLModel, table=True):
    # Fix this: due to me not figuring how to use declared_attr as a type :(
    __tablename__ = "users" # type: ignore

    id: Optional[int] = Field(sa_column=Column(BigInteger(), primary_key=True, autoincrement=True))
    username: str = Field(max_length=255, unique=True, nullable=False, index=True)
    name: str = Field(max_length=255, nullable=False)
    email: str = Field(max_length=255, nullable=False, unique=True, index=True)
    password: str = Field(nullable=False)