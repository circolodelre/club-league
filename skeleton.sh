#!/bin/bash

ARTEFACT_REPO=https://github.com/circolodelre/club-league
SKELETON_REPO=https://github.com/javanile/slim-skeleton

git remote set-url origin $ARTEFACT_REPO

git pull
git add .
git add *
git commit -m "Update artefact"
git push
