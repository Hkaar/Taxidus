from typing import List, Optional, TYPE_CHECKING
from sqlalchemy import BigInteger, Column
from sqlmodel import SQLModel, Field, Relationship

if TYPE_CHECKING:
    from src.app.models.entity import Entity

class EntityType(SQLModel, table=True):
    # Fix this: due to me not figuring how to use declared_attr as a type :(
    __tablename__ = "entity_types" # type: ignore

    id: Optional[int] = Field(sa_column=Column(BigInteger(), primary_key=True, autoincrement=True))
    name: str = Field(unique=True, index=True)

    entities: List["Entity"] = Relationship(back_populates="entities")