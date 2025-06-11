# 🚀 GitHub Actions - Configuração de Deploy Automático

## Programador PHP Freelancer - Deploy para Produção

### 📋 Visão Geral

Este documento explica como configurar o deploy automático do site usando GitHub Actions com FTP para o servidor de produção.

### 🔐 Configuração dos Secrets no GitHub

#### 1. Acesse o Repositório no GitHub
- Vá para: `Settings` → `Secrets and variables` → `Actions`

#### 2. Adicione os seguintes Repository Secrets:

| Secret Name | Value | Descrição |
|-------------|-------|-----------|
| `FTP_SERVER` | `ftp.mbiasotto.com` | Servidor FTP |
| `FTP_USERNAME` | `mbiasotto` | Login FTP |
| `FTP_PASSWORD` | `mB088516$d` | Senha FTP |

#### 3. Como adicionar cada secret:
1. Clique em **"New repository secret"**
2. Digite o **Name** (ex: `FTP_SERVER`)
3. Digite o **Value** (ex: `ftp.mbiasotto.com`)
4. Clique em **"Add secret"**
5. Repita para todos os secrets

### 🔧 Estrutura do Workflow

#### Workflow: `.github/workflows/deploy.yml`

O workflow é executado em **3 jobs sequenciais**:

#### 1. **🔍 Validate & Test**
- ✅ Valida sintaxe PHP
- 🔍 Verifica arquivos sensíveis
- 📊 Confere tamanhos de arquivos
- 🚫 Bloqueia deploy se houver problemas

#### 2. **🎉 Deploy to Production**
- 🚚 Baixa código mais recente
- 🗝️ Valida secrets configurados
- 🔧 Cria informações de deploy
- 🧹 Remove arquivos desnecessários
- 📂 Sincroniza via FTP
- 📢 Notifica sucesso/erro

#### 3. **🏥 Health Check**
- 🔍 Testa se site responde (HTTP 200)
- 🛡️ Verifica reCAPTCHA integrado
- 📊 Confirma Google Analytics
- 📋 Gera relatório final

### 🚦 Triggers de Deploy

#### Automático:
- Push para branch `main` ou `master`

#### Manual:
- Acesse: `Actions` → `Deploy Programador PHP Freelancer Website` → `Run workflow`

### 📂 Arquivos Excluídos do Deploy

#### Desenvolvimento:
- `.git*`, `.vscode/`, `.idea/`
- `node_modules/`, `vendor/`
- `composer.lock`, `package-lock.json`

#### Segurança:
- `.env*`, `config-local.php`
- `*.sql`, `*.dump`, `*.backup`
- `passwords.txt`, `credentials.txt`

#### Temporários:
- `*.log`, `*.tmp`, `*.temp`
- `.DS_Store`, `Thumbs.db`

### 🔍 Monitoramento do Deploy

#### Durante o Deploy:
1. Acesse: `Actions` tab no GitHub
2. Clique no workflow em execução
3. Monitore cada job em tempo real

#### Logs Detalhados:
- ✅ Validação de arquivos
- 📂 Sincronização FTP
- 🔍 Health checks
- 📊 Relatório final

### 🎯 Configurações do Servidor

#### Diretório de Deploy:
```
/domains/mbiasotto.com/public_html/
```

#### Estrutura no Servidor:
```
public_html/
├── index.php
├── contato.php
├── servicos.php
├── includes/
├── assets/
├── components/
└── ...
```

### 🚨 Solução de Problemas

#### 1. **"Secret not set"**
- ✅ Verificar se todos os secrets estão configurados
- ✅ Nomes exatos: `FTP_SERVER`, `FTP_USERNAME`, `FTP_PASSWORD`

#### 2. **"PHP syntax errors"**
- ✅ Testar sintaxe localmente: `php -l arquivo.php`
- ✅ Corrigir erros antes do commit

#### 3. **"Sensitive files found"**
- ✅ Adicionar arquivos ao `.gitignore`
- ✅ Não commitar credenciais

#### 4. **"FTP connection failed"**
- ✅ Verificar credenciais FTP
- ✅ Testar conexão manual
- ✅ Confirmar servidor disponível

#### 5. **"Large files detected"**
- ✅ Arquivos > 50MB são bloqueados
- ✅ Usar Git LFS para arquivos grandes
- ✅ Otimizar imagens/videos

### 📊 Relatório de Deploy

#### Informações Registradas:
- 📅 Data/hora do deploy
- 📊 Commit SHA
- 🔀 Branch deployada
- 👤 Usuário que executou
- ✅ Status (sucesso/erro)
- 🔗 URL do site

### 🔄 Manutenção

#### Verificações Regulares:
1. **Mensal**: Verificar logs de deploy
2. **Trimestral**: Atualizar credenciais FTP
3. **Semestral**: Revisar configurações

#### Atualizações:
- Actions são atualizadas automaticamente
- Monitorar deprecation warnings
- Testar em staging antes de produção

### 📞 Suporte

#### Para problemas com deploy:
- **Email**: mauricio@mbiasotto.com
- **WhatsApp**: (15) 98118-7063

#### Logs do GitHub Actions:
- Acessar `Actions` tab no repositório
- Verificar logs detalhados de cada job
- Copiar/colar erros para suporte

---

### ⚡ Quick Start

#### Para configurar agora:

1. **Adicionar Secrets**:
   ```
   Settings → Secrets and variables → Actions → New repository secret
   ```

2. **Fazer Commit**:
   ```bash
   git add .
   git commit -m "🚀 Add GitHub Actions deploy workflow"
   git push origin main
   ```

3. **Verificar Deploy**:
   ```
   Actions → Deploy Programador PHP Freelancer Website
   ```

#### ✅ **Sistema Pronto para Deploy Automático!**

A partir do próximo push para `main`, o site será automaticamente deployado para produção com todas as validações e verificações de segurança! 🎯 