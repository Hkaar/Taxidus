from typing import List, Optional, TYPE_CHECKING

from sqlalchemy import BigInteger, Column, ForeignKey
from sqlmodel import Relationship, SQLModel, Field

if TYPE_CHECKING:
    from src.app.models.entity_skill import EntitySkill
    from src.app.models.entity_type import EntityType
    from src.app.models.entity_item import EntityItem

class Entity(SQLModel, table=True):
    # Fix this: due to me not figuring how to use declared_attr as a type :(
    __tablename__ = "entities" # type: ignore

    id: Optional[int] = Field(sa_column=Column(BigInteger(), primary_key=True, autoincrement=True))
    name: str = Field(default=None, index=True)
    health: float = Field()
    defense: float = Field()
    magic_defense: float = Field()
    magic: float = Field()
    attack: float = Field()

    type_id: int = Field(sa_column=Column(BigInteger(), ForeignKey('entity_types.id'), index=True))
    type: "EntityType" = Relationship(back_populates="entity_types")

    items: List["EntityItem"] = Relationship(back_populates="items")
    skills: List["EntitySkill"] = Relationship(back_populates="skills")