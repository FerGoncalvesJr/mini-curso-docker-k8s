#!/bin/bash

echo "☸️  Deployando no Kubernetes"
echo "============================="

# Verificar se kubectl está disponível
if ! command -v kubectl &> /dev/null; then
    echo "❌ kubectl não encontrado. Por favor, instale o kubectl primeiro."
    exit 1
fi

# Verificar se o cluster está acessível
if ! kubectl cluster-info &> /dev/null; then
    echo "❌ Não foi possível conectar ao cluster Kubernetes."
    echo "   Certifique-se de que o cluster está rodando (minikube start, kind, etc.)"
    exit 1
fi

echo "✅ Cluster Kubernetes acessível"

# Construir a imagem Docker
echo "🔨 Construindo imagem Docker..."
docker build -t mini-curso-laravel:latest ./laravel-app/

# Aplicar os manifests
echo "📦 Aplicando manifests do Kubernetes..."
kubectl apply -f k8s/

# Aguardar os pods estarem prontos
echo "⏳ Aguardando pods estarem prontos..."
kubectl wait --for=condition=ready pod -l app=postgres --timeout=60s
kubectl wait --for=condition=ready pod -l app=laravel --timeout=60s

echo ""
echo "🎉 Deploy realizado com sucesso!"
echo ""
echo "📋 Status dos recursos:"
kubectl get pods
kubectl get services
echo ""
echo "🌐 Para acessar a aplicação:"
echo "   - Minikube: minikube service laravel-service"
echo "   - Kind: kubectl port-forward service/laravel-service 8000:8000"
echo "   - Outros: kubectl get service laravel-service"
echo ""
echo "📊 Comandos úteis:"
echo "  - Ver logs: kubectl logs -l app=laravel"
echo "  - Deletar: kubectl delete -f k8s/"
echo "  - Status: kubectl get all"
