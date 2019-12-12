# 🎓  TP - Symfony

You have 7 hours to realize the following case.

**You will be evaluated on your ability to meet the following 📝 functional goals.**

___

## 🌈 Normalize

The `DefaultController` must:

* 📝 Use `webpack-encore`
* 📝 Style correctly your pages with a `CSS framework`
* 📝 Display a `navigation` at least

## 💾 CRUD

### Product

A ProductController must:

* 📝 `Create` a product
* 📝 `Show all` products
* 📝 `Show` one product by id
* 📝 `Edit` a product by id
* 📝 `Delete` a product by id
* 📝 The product must be an entity with folowing `attributs`:
  * `id`: int
  * `name`: string
  * `description`: string
  * `category`: Category

You must have an `entity` in `relation` with an other. 

[@see Doctrine associations](https://symfony.com/doc/current/doctrine/associations.html)

The `ProductType` must have a `select list` for select a `Category` for his `name`.

[@see EntityType](https://symfony.com/doc/current/reference/forms/types/entity.html#basic-usage)

Take care about cascade `persist`, you do not want to create a `Category` when you create a `Product`!

[@see Cascade operations](https://www.doctrine-project.org/projects/doctrine-orm/en/2.6/reference/working-with-associations.html#transitive-persistence-cascade-operations)


## ✔️ Validation

`CategoryType` and `ProductType` must be completed.

* 📝 Name and description `can not be empty`
* 📝 Name and description have to `begin with a capital`

You can add `validation constraints` at differents places:

* [In entities](https://symfony.com/doc/current/reference/constraints/NotBlank.html#basic-usage)
* [In form classes](https://symfony.com/doc/current/validation.html#constraints-in-form-classes)

> Choose the one it feet the best.

[@see Form validation](https://symfony.com/doc/current/validation)

## 🎭 Cache

Every time a client came to show your entity collection, you perform a query to the database, even if the collection have not changed since the last query.

`CategoryType` and `ProductType` must be cached with `FilesystemAdapter`.

* 📝 Collections must be `saved` in the `pool` at modifcation
* 📝 Collections must be `retrieved` from the `pool` at reading

> The idea is to store in cache your query results when they changes and to deliver cache result for consultations.

[@see PSR-6](https://symfony.com/doc/current/components/cache.html)

___
## 🕕 Manage your time

You need to reapeat and complexyfy CRUD operations.

## 🎯 Let's focus
