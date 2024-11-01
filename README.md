# Taxidus

[![License](https://img.shields.io/badge/License-Apache_2.0-blue.svg)](https://opensource.org/licenses/Apache-2.0)
![Workflow Status](https://github.com/Hkaar/Taxidus/workflows/CI/badge.svg)
[![Maintenance](https://img.shields.io/badge/Maintained%3F-yes-green.svg)](https://GitHub.com/Naereen/StrapDown.js/graphs/commit-activity)

A game api server written in python

## Requirements

- Python >= 3.11
- PDM

## User setup

Clone the repo

```bash
git clone https://github.com/Hkaar/Taxidus.git
```

Install the dependecies

```bash
pdm install
```

Initialize the virtual environment

`Bash`

```bash
source ./.venv/bin/activate
```

`Powershell`

```powershell
.\.venv\Scripts\Activate.ps1
```

Run the migrations

```bash
alembic upgrade head
```

Run the app

`Development mode`

```bash
fastapi dev src
```

`Production`

```bash
fastapi run src
```

## Contribution guide

See on how to contribute by going to the [contribution guide](https://github.com/Hkaar/7Books/blob/master/CONTRIBUTING.md) of the project
