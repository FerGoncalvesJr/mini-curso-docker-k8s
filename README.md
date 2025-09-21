# 🚀 Mini Curso Docker + Laravel + PostgreSQL + Kubernetes

Este repositório contém o código e os arquivos necessários para o **mini curso de Docker e Kubernetes**,
usando **Laravel + PostgreSQL**.

---

## 📌 Estrutura do Projeto
```
mini-curso/
├── docker-compose.yml          # Orquestração local com Docker Compose
├── start.sh                    # Script para iniciar a aplicação
├── deploy-k8s.sh              # Script para deploy no Kubernetes
├── laravel-app/               # Aplicação Laravel
│   ├── Dockerfile             # Build da imagem Laravel
│   ├── docker/                # Configurações Docker (nginx, supervisor)
│   ├── config/                # Configurações Laravel
│   ├── routes/                # Rotas da aplicação
│   ├── resources/views/       # Views Blade
│   └── public/                # Arquivos públicos
└── k8s/                       # Manifests do Kubernetes
    ├── deployment.yaml        # Deployment Laravel
    ├── service.yaml           # Service Laravel
    ├── postgres-deployment.yaml # Deployment PostgreSQL
    └── postgres-service.yaml  # Service PostgreSQL
```

---

## 🚀 Início Rápido

### **Opção 1: Script Automático (Recomendado)**
```bash
./start.sh
```

### **Opção 2: Comandos Manuais**

#### **1. Subindo Laravel + PostgreSQL com Docker Compose**
```bash
# Construir e iniciar os containers
docker-compose up -d --build

# Verificar se estão rodando
docker ps

# Ver logs
docker-compose logs -f
```

#### **2. Acessando a Aplicação**
- **Laravel**: http://localhost:8000
- **Health Check**: http://localhost:8000/health
- **API Alunos**: http://localhost:8000/alunos

#### **3. Executando Migrations (se necessário)**
```bash
docker exec mini-curso-laravel-app php artisan migrate --force
```

---

## ☸️ Kubernetes

### **Opção 1: Script Automático**
```bash
./deploy-k8s.sh
```

### **Opção 2: Comandos Manuais**

#### **1. Preparação**
```bash
# Construir a imagem Docker
docker build -t mini-curso-laravel:latest ./laravel-app/

# Verificar se o cluster está rodando
kubectl cluster-info
```

#### **2. Deploy no Kubernetes**
```bash
# Aplicar todos os manifests
kubectl apply -f k8s/

# Verificar status
kubectl get pods
kubectl get services
```

#### **3. Acessando a Aplicação**

**Minikube:**
```bash
minikube service laravel-service
```

**Kind ou outros clusters:**
```bash
kubectl port-forward service/laravel-service 8000:8000
```

**Verificar IP externo:**
```bash
kubectl get service laravel-service
```

---

## 📝 Roteiro de Demonstração

### **1. Preparação**
- Mostrar a estrutura do projeto
- Explicar Docker vs Kubernetes
- Demonstrar os scripts automáticos

### **2. Docker Compose**
- Executar `./start.sh`
- Mostrar containers rodando: `docker ps`
- Acessar aplicação: http://localhost:8000
- Demonstrar endpoints: `/health`, `/alunos`
- Mostrar logs: `docker-compose logs -f`

### **3. Customização**
- Editar `routes/web.php` para adicionar nova rota
- Mostrar hot reload funcionando
- Demonstrar persistência de dados

### **4. Docker Hub**
```bash
# Construir e taggear imagem
docker build -t seu-usuario/mini-curso-laravel:latest ./laravel-app/

# Fazer login no Docker Hub
docker login

# Push da imagem
docker push seu-usuario/mini-curso-laravel:latest
```

### **5. Kubernetes**
- Executar `./deploy-k8s.sh`
- Mostrar pods: `kubectl get pods`
- Mostrar services: `kubectl get services`
- Acessar aplicação via Kubernetes
- Demonstrar escalabilidade: `kubectl scale deployment laravel-deployment --replicas=3`

### **6. Monitoramento**
- Mostrar logs: `kubectl logs -l app=laravel`
- Demonstrar health checks
- Mostrar recursos: `kubectl top pods`

### **7. Encerramento**
- Resumir benefícios do Docker
- Explicar vantagens do Kubernetes
- Próximos passos e recursos

---

## 🛠️ Comandos Úteis

### **Docker Compose**
```bash
# Iniciar
docker-compose up -d

# Parar
docker-compose down

# Rebuild
docker-compose up -d --build

# Ver logs
docker-compose logs -f

# Executar comando no container
docker exec -it mini-curso-laravel-app php artisan migrate
```

### **Kubernetes**
```bash
# Status geral
kubectl get all

# Ver pods
kubectl get pods

# Ver logs
kubectl logs -l app=laravel

# Escalar deployment
kubectl scale deployment laravel-deployment --replicas=3

# Deletar recursos
kubectl delete -f k8s/

# Port forward
kubectl port-forward service/laravel-service 8000:8000
```

---

## 🔧 Troubleshooting

### **Problemas Comuns**

**1. Container não inicia:**
```bash
docker-compose logs app
```

**2. Banco não conecta:**
```bash
docker-compose logs db
```

**3. Pod não fica Ready:**
```bash
kubectl describe pod <pod-name>
kubectl logs <pod-name>
```

**4. Service não acessível:**
```bash
kubectl get endpoints
kubectl describe service laravel-service
```

---

## 📚 Recursos Adicionais

- [Docker Documentation](https://docs.docker.com/)
- [Kubernetes Documentation](https://kubernetes.io/docs/)
- [Laravel Documentation](https://laravel.com/docs)
- [PostgreSQL Documentation](https://www.postgresql.org/docs/)

---

👨‍🏫 **Projeto preparado para demonstração educacional!**
