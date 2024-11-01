"""Initial setup revisions

Revision ID: 45f558e493be
Revises: 
Create Date: 2024-11-01 09:48:51.822686

"""
from typing import Sequence, Union

from alembic import op
import sqlalchemy as sa

import sqlmodel
import sqlmodel.sql.sqltypes


# revision identifiers, used by Alembic.
revision: str = '45f558e493be'
down_revision: Union[str, None] = None
branch_labels: Union[str, Sequence[str], None] = None
depends_on: Union[str, Sequence[str], None] = None


def upgrade() -> None:
    # ### commands auto generated by Alembic - please adjust! ###
    op.create_table('entity_types',
    sa.Column('id', sa.BigInteger(), autoincrement=True, nullable=False),
    sa.Column('name', sqlmodel.sql.sqltypes.AutoString(), nullable=False),
    sa.PrimaryKeyConstraint('id')
    )
    op.create_index(op.f('ix_entity_types_name'), 'entity_types', ['name'], unique=True)
    op.create_table('items',
    sa.Column('id', sa.BigInteger(), autoincrement=True, nullable=False),
    sa.Column('name', sqlmodel.sql.sqltypes.AutoString(), nullable=False),
    sa.Column('desc', sqlmodel.sql.sqltypes.AutoString(), nullable=True),
    sa.PrimaryKeyConstraint('id')
    )
    op.create_index(op.f('ix_items_name'), 'items', ['name'], unique=True)
    op.create_table('objects',
    sa.Column('id', sa.BigInteger(), autoincrement=True, nullable=False),
    sa.Column('name', sqlmodel.sql.sqltypes.AutoString(), nullable=False),
    sa.PrimaryKeyConstraint('id')
    )
    op.create_index(op.f('ix_objects_name'), 'objects', ['name'], unique=True)
    op.create_table('skills',
    sa.Column('id', sa.BigInteger(), autoincrement=True, nullable=False),
    sa.Column('name', sqlmodel.sql.sqltypes.AutoString(), nullable=False),
    sa.Column('desc', sqlmodel.sql.sqltypes.AutoString(), nullable=True),
    sa.PrimaryKeyConstraint('id')
    )
    op.create_index(op.f('ix_skills_name'), 'skills', ['name'], unique=True)
    op.create_table('users',
    sa.Column('id', sa.BigInteger(), autoincrement=True, nullable=False),
    sa.Column('username', sqlmodel.sql.sqltypes.AutoString(length=255), nullable=False),
    sa.Column('name', sqlmodel.sql.sqltypes.AutoString(length=255), nullable=False),
    sa.Column('email', sqlmodel.sql.sqltypes.AutoString(length=255), nullable=False),
    sa.Column('password', sqlmodel.sql.sqltypes.AutoString(), nullable=False),
    sa.PrimaryKeyConstraint('id')
    )
    op.create_index(op.f('ix_users_email'), 'users', ['email'], unique=True)
    op.create_index(op.f('ix_users_username'), 'users', ['username'], unique=True)
    op.create_table('entities',
    sa.Column('id', sa.BigInteger(), autoincrement=True, nullable=False),
    sa.Column('name', sqlmodel.sql.sqltypes.AutoString(), nullable=False),
    sa.Column('health', sa.Float(), nullable=False),
    sa.Column('defense', sa.Float(), nullable=False),
    sa.Column('magic_defense', sa.Float(), nullable=False),
    sa.Column('magic', sa.Float(), nullable=False),
    sa.Column('attack', sa.Float(), nullable=False),
    sa.Column('type_id', sa.BigInteger(), nullable=True),
    sa.ForeignKeyConstraint(['type_id'], ['entity_types.id'], "fk_entity_types_id_ibfk1"),
    sa.PrimaryKeyConstraint('id')
    )
    op.create_index(op.f('ix_entities_name'), 'entities', ['name'], unique=False)
    op.create_index(op.f('ix_entities_type_id'), 'entities', ['type_id'], unique=False)
    op.create_table('entity_items',
    sa.Column('id', sa.BigInteger(), autoincrement=True, nullable=False),
    sa.Column('entity_id', sa.BigInteger(), nullable=False),
    sa.Column('item_id', sa.BigInteger(), nullable=True),
    sa.ForeignKeyConstraint(['entity_id'], ['entities.id'], "fk_entities_id_ibfk1"),
    sa.ForeignKeyConstraint(['item_id'], ['items.id'], "fk_items_id_ibfk1"),
    sa.PrimaryKeyConstraint('id')
    )
    op.create_index(op.f('ix_entity_items_entity_id'), 'entity_items', ['entity_id'], unique=False)
    op.create_index(op.f('ix_entity_items_item_id'), 'entity_items', ['item_id'], unique=False)
    op.create_table('entity_skills',
    sa.Column('id', sa.BigInteger(), autoincrement=True, nullable=False),
    sa.Column('entity_id', sa.BigInteger(), nullable=True),
    sa.Column('skill_id', sa.BigInteger(), nullable=True),
    sa.ForeignKeyConstraint(['entity_id'], ['entities.id'], "fk_entities_id_ibfk2"),
    sa.ForeignKeyConstraint(['skill_id'], ['skills.id'], "fk_skills_id_ibfk1"),
    sa.PrimaryKeyConstraint('id')
    )
    op.create_index(op.f('ix_entity_skills_entity_id'), 'entity_skills', ['entity_id'], unique=False)
    op.create_index(op.f('ix_entity_skills_skill_id'), 'entity_skills', ['skill_id'], unique=False)
    # ### end Alembic commands ###


def downgrade() -> None:
    # ### commands auto generated by Alembic - please adjust! ###
    op.drop_constraint("fk_entities_id_ibfk2", "entity_skills", type_="foreignkey")
    op.drop_constraint("fk_skills_id_ibfk1", "entity_skills", type_="foreignkey")
    op.drop_index(op.f('ix_entity_skills_skill_id'), table_name='entity_skills')
    op.drop_index(op.f('ix_entity_skills_entity_id'), table_name='entity_skills')
    op.drop_table('entity_skills')

    op.drop_constraint("fk_entities_id_ibfk1", "entity_items", type_="entity_items")
    op.drop_constraint("fk_items_id_ibfk1", "entity_items", type_="foreignkey")
    op.drop_index(op.f('ix_entity_items_item_id'), table_name='entity_items')
    op.drop_index(op.f('ix_entity_items_entity_id'), table_name='entity_items')
    op.drop_table('entity_items')

    op.drop_constraint("fk_entity_types_id_ibfk1", "entities", type_="foreignkey")
    op.drop_index(op.f('ix_entities_type_id'), table_name='entities')
    op.drop_index(op.f('ix_entities_name'), table_name='entities')
    op.drop_table('entities')

    op.drop_index(op.f('ix_users_username'), table_name='users')
    op.drop_index(op.f('ix_users_email'), table_name='users')
    op.drop_table('users')
    
    op.drop_index(op.f('ix_skills_name'), table_name='skills')
    op.drop_table('skills')
    
    op.drop_index(op.f('ix_objects_name'), table_name='objects')
    op.drop_table('objects')
    
    op.drop_index(op.f('ix_items_name'), table_name='items')
    op.drop_table('items')
    
    op.drop_index(op.f('ix_entity_types_name'), table_name='entity_types')
    op.drop_table('entity_types')
    # ### end Alembic commands ###
