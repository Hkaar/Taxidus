from typing import List, Optional, TYPE_CHECKING
from sqlalchemy import BigInteger, Column
from sqlmodel import Relationship, SQLModel, Field

if TYPE_CHECKING:
    from src.app.models.entity_item import EntityItem

class Item(SQLModel, table=True):
    # Fix this: due to me not figuring how to use declared_attr as a type :(
    __tablename__ = "items"  # type: ignore

    id: Optional[int] = Field(sa_column=Column(BigInteger(), primary_key=True, autoincrement=True))
    name: str = Field(default=None, unique=True, index=True)
    desc: Optional[str] = Field(default=None, nullable=True)

    entities: List["EntityItem"] = Relationship(back_populates="entities")