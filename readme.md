# 🧩 CRUD POQMON

Um pequeno projeto em **PHP puro** com **MySQL** e **Docker**, desenvolvido para fins de estudo.  
O sistema permite **cadastrar, visualizar, editar e excluir Poqmons**, incluindo upload de imagem e dados descritivos.

---

## 🚀 Tecnologias utilizadas

- **PHP 8**
- **MySQL 8**
- **Docker + Docker Compose**
- **HTML / CSS / JavaScript**

---

## ⚙️ Como rodar o projeto

### Clonar o repositório

```bash
git clone https://github.com/Ryan-Hen/CRUD-PHP.git
cd CRUD-PHP
```

### renomear o arquivo app/config/conn-sample.php para -> conn.php

### inserir os dados do seu banco nas variáveis do arquivo conn.php

### Subir os containers com Docker

```bash
docker compose up -d
```

### Criar e popular o banco de dados (Seed)

```bash
docker compose exec app php app/config/conn.php
docker compose exec app php app/config/seed.php
```

### Pronto!
