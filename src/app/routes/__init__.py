from fastapi import APIRouter
from fastapi.responses import JSONResponse

testRouter = APIRouter(prefix="/test")

@testRouter.get('/')
def test() -> JSONResponse:
    return JSONResponse({"message": "Hello world!"})