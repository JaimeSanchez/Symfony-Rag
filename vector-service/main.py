from fastapi import FastAPI, HTTPException
from pydantic import BaseModel
import httpx
import os
from typing import Optional, List

app = FastAPI(title="Vector Service")

class HealthResponse(BaseModel):
    status: str
    version: str = "1.0.0"

@app.get("/health", response_model=HealthResponse)
async def health_check():
    return HealthResponse(status="healthy")

@app.get("/")
async def root():
    return {"message": "Vector Service is running"} 