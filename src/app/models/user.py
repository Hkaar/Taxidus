from typing import Optional

from sqlmodel import SQLModel, Field

class User(SQLModel, table=True):
    __tablename__ = "users" # type: ignore

    id: Optional[int] = Field(default=None, primary_key=True, index=True)
    username: str = Field(max_length=255, unique=True, nullable=False, index=True)
    name: str = Field(max_length=255, nullable=False)
    email: str = Field(max_length=255, nullable=False, unique=True, index=True)
    password: str = Field(nullable=False)