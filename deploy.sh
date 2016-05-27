#!/bin/bash

hugo --theme=hugo-base-theme &&
(cd public ; scp -r * thebayhorse@thebayhorse.pub:public/htdocs/)
