#!/bin/bash

echo "🚀 Iniciando Mini Curso Docker + Laravel + PostgreSQL + Kubernetes"
echo "=================================================================="

# Verificar se Docker está rodando
if ! docker info > /dev/null 2>&1; then
    echo "❌ Docker não está rodando. Por favor, inicie o Docker primeiro."
    exit 1
fi

echo "✅ Docker está rodando"

# Parar containers existentes
echo "🛑 Parando containers existentes..."
docker-compose down

# Construir e iniciar os containers
echo "🔨 Construindo e iniciando containers..."
docker-compose up -d --build

# Aguardar o banco estar pronto
echo "⏳ Aguardando PostgreSQL estar pronto..."
sleep 10

# Executar migrations (se existirem)
echo "📊 Executando migrations..."
docker exec mini-curso-laravel-app php artisan migrate --force || echo "⚠️  Nenhuma migration encontrada"

echo ""
echo "🎉 Aplicação iniciada com sucesso!"
echo "🌐 Acesse: http://localhost:8000"
echo "📊 Health check: http://localhost:8000/health"
echo "👥 Alunos: http://localhost:8000/alunos"
echo ""
echo "📋 Comandos úteis:"
echo "  - Ver logs: docker-compose logs -f"
echo "  - Parar: docker-compose down"
echo "  - Rebuild: docker-compose up -d --build"
