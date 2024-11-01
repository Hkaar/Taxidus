def import_tables():
    from .user import User  # noqa: F401
    from .entity_type import EntityType # noqa: F401
    from .entity import Entity # noqa: F401
    from .object import Object  # noqa: F401
    from .item import Item # noqa: F401
    from .skill import Skill # noqa: F401
    from .entity_skill import EntitySkill # noqa: F401
    from .entity_item import EntityItem # noqa: F401