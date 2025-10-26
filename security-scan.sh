#!/bin/bash

echo "========================================="
echo "OWASP ZAP Security Scan"
echo "========================================="
echo ""

# Check if Docker is running
if ! docker info > /dev/null 2>&1; then
    echo "❌ Error: Docker is not running"
    echo "Please start Docker and try again"
    exit 1
fi

# Check if app is running on port 8000
if ! curl -s http://localhost:8000 > /dev/null; then
    echo "❌ Error: Application is not running on http://localhost:8000"
    echo ""
    echo "Please start your Laravel app first:"
    echo "  php artisan serve"
    echo ""
    exit 1
fi

echo "✅ Docker is running"
echo "✅ Application is running on http://localhost:8000"
echo ""
echo "Starting OWASP ZAP baseline scan..."
echo "This will take 2-5 minutes..."
echo ""

# Run OWASP ZAP baseline scan
docker run -t owasp/zap2docker-stable zap-baseline.py -t http://host.docker.internal:8000

echo ""
echo "========================================="
echo "Scan Complete!"
echo "========================================="
