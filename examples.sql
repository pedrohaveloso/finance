-- Abaixo, exemplos de queries para o fluxo
-- da aplicação (inserção de usuários, categorias etc.).
-- 
-- Toda interrogação (?) que aparecer seria um dado colocado 
-- pelo PHP.
--
--
-- -- Fluxo de cadastro de usuário
-- Verificar se o usuário já existe:
SELECT
  *
FROM
  "User"
WHERE
  "email" = ?;

-- Se não existir, inserir:
INSERT INTO
  "User" ("name", "email", "password")
VALUES
  (?, ?, ?);

--
--
-- -- Fluxo de entrada de usuário
-- Verificar se o usuário já existe:
SELECT
  *
FROM
  "User"
WHERE
  "email" = ?;

-- Se existir, verificar se a senha inserida no login
-- bate com a senha no banco, se bater, logar (tudo no PHP).
--
--
-- -- Categorias
-- Seleção de todas as categorias para o usuário
SELECT
  *
FROM
  "Category"
WHERE
  (
    "user_id" = ?
    OR "user_id" IS NULL
  );

-- Na tela de categorias podemos ter um filtro,
-- por exemplo, filtrar a categoria por nome, como
AND "name" LIKE "%?%"
-- Também podemos adicionar uma ordenação nas 
-- categorias pela sua prioridade, as mais importantes
-- primeiro ou vice-versa
ORDER BY
  "priority";

-- Ou
ORDER BY
  DESC "priority";

-- Inserção de uma categoria
INSERT INTO
  "Category" ("name", "priority", "user_id")
VALUES
  (?, ?, ?);

-- Exclusão de uma categoria
DELETE FROM "Category"
WHERE
  "id" = ?
  AND "user_id" = ?;

-- Mas ué... por quê precisamos do "user_id"
-- para excluir a categoria? Não seria necessário
-- só o "id" dela? NÃO!
--
-- Precisamos do "user_id" para garantir que o usuário
-- está excluindo uma categoria que é apenas dele.
-- Atualização de uma categoria
UPDATE "Category"
SET
  "name" = ?,
  "priority" = ?,
  "user_id" = ?
WHERE
  "id" = ?
  AND "user_id" = ?;

--
--
-- -- Meses
--
--
-- -- Transações
--
--
-- -- Meses e transações
-- Selecionar as transações de um mês específico
SELECT
  *
FROM
  "Transaction"
WHERE
  "user_id" = ?
  AND "month_id" = ?;