from dotenv import load_dotenv
from os import getenv

# Change this if you want to load a different file
load_dotenv('.env')

def env(key: str):
    """Get a environment variable

    Parameters
    ----------
    key : str
        The identifier key of the environment variable

    Returns
    -------
    str | None
        Returns the value of the variable or None if it doesn't exist
    """
    return getenv(key)
