#!/bin/bash

echo "Stopping Docker..."
sudo systemctl stop docker

echo "Starting Nginx..."
sudo systemctl start nginx

echo "Starting Docker..."
sudo systemctl start docker

echo "Magento is ready to use http://magento.local/"
