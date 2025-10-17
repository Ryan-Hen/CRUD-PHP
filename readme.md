# 🧩 CRUD POQMON

Um pequeno projeto em **PHP puro** com **MySQL** e **Docker**, desenvolvido para fins de estudo.  
O sistema permite **cadastrar, visualizar, editar e excluir Pokémons**, incluindo upload de imagem e dados descritivos.

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
cd poqmon
```

### Subir os containers com Docker

```bash
docker compose up -d
```

### Criar e popular o banco de dados (Seed)

```bash
docker compose exec app php app/config/conn.php
docker compose exec app php app/config/seed.php
```

### That's it
