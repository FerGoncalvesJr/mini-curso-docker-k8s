# 🚀 Mini Curso Docker + Laravel + PostgreSQL + Kubernetes

Este repositório contém o código e os arquivos necessários para o **mini curso de Docker e Kubernetes**,
usando **Laravel + PostgreSQL**.

---

## 📋 Pré-requisitos (Instalação)

### **1. Instalar Docker**
```bash
# Ubuntu/Debian
sudo apt update
sudo apt install -y docker.io docker-compose
sudo systemctl start docker
sudo systemctl enable docker
sudo usermod -aG docker $USER
# Faça logout e login novamente

# Verificar instalação
docker --version
docker-compose --version
```

### **2. Instalar kubectl**
```bash
# Ubuntu/Debian
curl -LO "https://dl.k8s.io/release/$(curl -L -s https://dl.k8s.io/release/stable.txt)/bin/linux/amd64/kubectl"
sudo install -o root -g root -m 0755 kubectl /usr/local/bin/kubectl

# Verificar instalação
kubectl version --client
```

### **3. Instalar Minikube**
```bash
# Ubuntu/Debian
curl -LO https://storage.googleapis.com/minikube/releases/latest/minikube-linux-amd64
sudo install minikube-linux-amd64 /usr/local/bin/minikube

# Verificar instalação
minikube version
```

### **4. Instalar Git (se necessário)**
```bash
sudo apt install -y git
```

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

### **1. Clonar o Repositório**
```bash
git clone https://github.com/SEU_USUARIO/mini-curso-docker-k8s.git
cd mini-curso-docker-k8s
```

### **2. Docker Compose (Opção 1: Script Automático)**
```bash
./start.sh
```

### **3. Docker Compose (Opção 2: Comandos Manuais)**
```bash
# Construir e iniciar os containers
docker-compose up -d --build

# Verificar se estão rodando
docker ps

# Ver logs
docker-compose logs -f
```

### **4. Acessando a Aplicação**
- **Laravel**: http://localhost:8000
- **Health Check**: http://localhost:8000/health
- **API Alunos**: http://localhost:8000/alunos

---

## ☸️ Kubernetes

### **Opção 1: Script Automático**
```bash
# Iniciar cluster Kubernetes
minikube start

# Deploy automático
./deploy-k8s.sh
```

### **Opção 2: Comandos Manuais**

#### **1. Preparação**
```bash
# Iniciar cluster Kubernetes
minikube start

# Verificar cluster
kubectl cluster-info
kubectl get nodes

# Construir a imagem Docker
docker build -t mini-curso-laravel:latest ./laravel-app/

# Carregar imagem no Minikube
minikube image load mini-curso-laravel:latest
```

#### **2. Deploy no Kubernetes**
```bash
# Aplicar todos os manifests
kubectl apply -f k8s/

# Verificar status
kubectl get pods
kubectl get services
kubectl get deployments
```

#### **3. Acessando a Aplicação**

**Via Port Forward:**
```bash
kubectl port-forward service/laravel-service 8080:8000
# Acesse: http://localhost:8080
```

**Via Minikube Service:**
```bash
minikube service laravel-service --url
```

---

## 📝 Roteiro de Demonstração (2h30min)

### **1. Preparação**
- Verificar instalações: `docker --version`, `kubectl version --client`, `minikube version`
- Mostrar estrutura do projeto
- Explicar Docker vs Kubernetes

### **2. Docker Compose**
- Executar `./start.sh`
- Mostrar containers rodando: `docker ps`
- Acessar aplicação: http://localhost:8000
- Demonstrar endpoints: `/health`, `/alunos`
- Mostrar logs: `docker-compose logs -f`

### **3. Customização**
- Editar `laravel-app/public/index.php` para adicionar nova rota
- Mostrar hot reload funcionando
- Demonstrar persistência de dados

### **4. Kubernetes**
- Executar `minikube start`
- Executar `./deploy-k8s.sh`
- Mostrar pods: `kubectl get pods`
- Mostrar services: `kubectl get services`
- Acessar aplicação via Kubernetes
- Demonstrar escalabilidade: `kubectl scale deployment laravel-deployment --replicas=3`

### **5. Monitoramento**
- Mostrar logs: `kubectl logs -l app=laravel`
- Demonstrar health checks
- Mostrar recursos: `kubectl top pods`

### **6. Encerramento**
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
kubectl port-forward service/laravel-service 8080:8000

# Parar cluster
minikube stop
```

---

## 🔧 Troubleshooting

### **Problemas Comuns**

**1. Docker não inicia:**
```bash
sudo systemctl restart docker
sudo usermod -aG docker $USER
# Faça logout e login novamente
```

**2. Container não inicia:**
```bash
docker-compose logs app
```

**3. Minikube não inicia:**
```bash
minikube delete
minikube start
```

**4. Pod não fica Ready:**
```bash
kubectl describe pod <pod-name>
kubectl logs <pod-name>
```

**5. Imagem não encontrada:**
```bash
minikube image load mini-curso-laravel:latest
```

**6. Porta ocupada:**
```bash
lsof -i :8000
kubectl port-forward service/laravel-service 8080:8000
```

### **Limpeza Completa**
```bash
# Parar tudo
docker-compose down
kubectl delete -f k8s/
minikube stop

# Limpar imagens
docker system prune -a

# Resetar Minikube
minikube delete
minikube start
```

---

## 📚 URLs Importantes

- **Docker Compose**: http://localhost:8000
- **Kubernetes**: http://localhost:8080 (port-forward)
- **Health Check**: http://localhost:8000/health
- **API Alunos**: http://localhost:8000/alunos

---

## 📚 Recursos Adicionais

- [Docker Documentation](https://docs.docker.com/)
- [Kubernetes Documentation](https://kubernetes.io/docs/)
- [Laravel Documentation](https://laravel.com/docs)
- [PostgreSQL Documentation](https://www.postgresql.org/docs/)

---

👨‍🏫 **Projeto preparado para demonstração educacional!**
