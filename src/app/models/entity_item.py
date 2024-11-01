from typing import Optional
from sqlalchemy import BigInteger, Column, ForeignKey
from sqlmodel import SQLModel, Field, Relationship

from src.app.models.entity import Entity
from src.app.models.item import Item

class EntityItem(SQLModel, table=True):
    # Fix this: due to me not figuring how to use declared_attr as a type :(
    __tablename__ = "entity_items" # type: ignore

    id: Optional[int] = Field(sa_column=Column(BigInteger(), primary_key=True, autoincrement=True))

    entity_id: int = Field(sa_column=Column(BigInteger(), ForeignKey("entities.id"), index=True, nullable=False))
    entity: "Entity" = Relationship(back_populates="entities", link_model=Entity)

    item_id: int = Field(sa_column=Column(BigInteger(), ForeignKey('items.id'), index=True))
    item: "Item" = Relationship(back_populates="items", link_model=Item)