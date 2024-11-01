from typing import Optional
from sqlalchemy import BigInteger, Column, ForeignKey
from sqlmodel import Relationship, SQLModel, Field

from src.app.models.entity import Entity
from src.app.models.skill import Skill

class EntitySkill(SQLModel, table=True):
    # Fix this: due to me not figuring how to use declared_attr as a type :(
    __tablename__ = "entity_skills"  # type: ignore

    id: Optional[int] = Field(sa_column=Column(BigInteger(), primary_key=True, autoincrement=True))
    
    entity_id: int = Field(sa_column=Column(BigInteger(), ForeignKey('entities.id'), index=True))
    entity: Entity = Relationship(back_populates="entities", link_model=Entity)

    skill_id: int = Field(sa_column=Column(BigInteger(), ForeignKey("skills.id"), index=True))
    skill: "Skill" = Relationship(back_populates="skills", link_model=Skill)