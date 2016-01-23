#!/bin/bash
clear
ab -n 10000 -c 100 localhost:5000/
