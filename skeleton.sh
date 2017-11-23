#!/bin/bash

ARTEFACT_REPO=https://github.com/circolodelre/club-league
SKELETON_REPO=https://github.com/javanile/slim-skeleton

## Update artefact before sync skeleton
git remote set-url origin $ARTEFACT_REPO
git pull
git add .
git add *
git commit -m "Update artefact"
git push

## Update skeleton
git remote set-url origin $SKELETON_REPO
git pull
git add .
git add *
git commit -m "Update skeleton"
git push

## Refresh artefact after skeleton sync
git remote set-url origin $ARTEFACT_REPO
git pull
git add .
git add *
git commit -m "Refresh artefact"
git push
