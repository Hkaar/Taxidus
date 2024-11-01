from typing import Optional

from sqlalchemy import BigInteger, Column
from sqlmodel import SQLModel, Field

class Object(SQLModel, table=True):
    # Fix this: due to me not figuring how to use declared_attr as a type :(
    __tablename__ = "objects"  # type: ignore

    id: Optional[int] = Field(sa_column=Column(BigInteger(), primary_key=True, autoincrement=True))
    name: str = Field(unique=True, index=True)
