<!DOCTYPE html>
<html lang="pt-BR">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>{{ config('app.name', 'Laravel') }}</title>
    <style>
        body {
            font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
            margin: 0;
            padding: 0;
            background: linear-gradient(135deg, #667eea 0%, #764ba2 100%);
            min-height: 100vh;
            display: flex;
            align-items: center;
            justify-content: center;
        }
        .container {
            background: white;
            padding: 3rem;
            border-radius: 15px;
            box-shadow: 0 20px 40px rgba(0,0,0,0.1);
            text-align: center;
            max-width: 600px;
            margin: 2rem;
        }
        h1 {
            color: #333;
            margin-bottom: 1rem;
            font-size: 2.5rem;
        }
        .subtitle {
            color: #666;
            font-size: 1.2rem;
            margin-bottom: 2rem;
        }
        .features {
            display: grid;
            grid-template-columns: repeat(auto-fit, minmax(200px, 1fr));
            gap: 1rem;
            margin: 2rem 0;
        }
        .feature {
            background: #f8f9fa;
            padding: 1.5rem;
            border-radius: 10px;
            border-left: 4px solid #667eea;
        }
        .feature h3 {
            margin: 0 0 0.5rem 0;
            color: #333;
        }
        .feature p {
            margin: 0;
            color: #666;
            font-size: 0.9rem;
        }
        .links {
            margin-top: 2rem;
        }
        .links a {
            display: inline-block;
            margin: 0.5rem;
            padding: 0.8rem 1.5rem;
            background: #667eea;
            color: white;
            text-decoration: none;
            border-radius: 25px;
            transition: background 0.3s;
        }
        .links a:hover {
            background: #5a6fd8;
        }
        .status {
            background: #d4edda;
            color: #155724;
            padding: 1rem;
            border-radius: 8px;
            margin: 1rem 0;
            border-left: 4px solid #28a745;
        }
    </style>
</head>
<body>
    <div class="container">
        <h1>🚀 {{ config('app.name') }}</h1>
        <p class="subtitle">Mini Curso Docker + Laravel + PostgreSQL + Kubernetes</p>
        
        <div class="status">
            ✅ Aplicação Laravel funcionando perfeitamente!
        </div>

        <div class="features">
            <div class="feature">
                <h3>🐳 Docker</h3>
                <p>Containerização da aplicação</p>
            </div>
            <div class="feature">
                <h3>🐘 PostgreSQL</h3>
                <p>Banco de dados robusto</p>
            </div>
            <div class="feature">
                <h3>☸️ Kubernetes</h3>
                <p>Orquestração em produção</p>
            </div>
        </div>

        <div class="links">
            <a href="/alunos">Ver Alunos</a>
            <a href="/health">Health Check</a>
        </div>

        <p style="margin-top: 2rem; color: #999; font-size: 0.9rem;">
            Desenvolvido para demonstração educacional
        </p>
    </div>
</body>
</html>
