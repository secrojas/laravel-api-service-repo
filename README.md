# Laravel API Backend with Service-Repository Pattern

This is a Laravel 11 API project that follows the **Service-Repository** pattern, aiming to maintain a clean and scalable architecture. The project is structured to support continuous feature additions and integrates unit testing with **Pest** for high-quality, reliable development.

## Features

- **Service-Repository Pattern**: Separates business logic (services) from data access (repositories), allowing modular and maintainable code.
- **Category & Post CRUD APIs**: Basic CRUD operations for managing categories and posts, with additional functionality for relations.
- **Custom Requests for Validation**: Validation rules and error messages are handled using custom requests, allowing flexible validation logic.
- **Resources for JSON Response Formatting**: `Laravel Resources` are used to format API responses, ensuring consistency and clarity in the output.
- **Exception Handling**: Comprehensive exception handling, especially for database constraints, to return informative error messages.
- **Pest for Unit Testing**: Unit tests ensure that services, repositories, and endpoints function as expected.

## Endpoints

| Endpoint                     | Method | Description                        |
| ---------------------------- | ------ | ---------------------------------- |
| `/api/categories`            | GET    | Lists all categories               |
| `/api/categories`            | POST   | Creates a new category             |
| `/api/categories/{id}`       | GET    | Retrieves a specific category      |
| `/api/categories/{id}`       | PUT    | Updates an existing category       |
| `/api/categories/{id}`       | DELETE | Deletes a category                 |
| `/api/categories/{id}/posts` | GET  | Lists all posts within a category    |
| `/api/posts`                 | POST   | Creates a new post                 |

## Architecture

### Service-Repository Pattern

The **Service-Repository pattern** separates concerns:
- **Services** handle the business logic, allowing complex operations without direct model dependencies.
- **Repositories** manage data access, allowing the use of different storage backends and improving code testability.

### Custom Request Validation

Each API endpoint uses custom requests for validation. For example, `StoreCategoryRequest` and `UpdateCategoryRequest` handle input validation for category creation and update, respectively, providing specific error messages for each field.

### Resources for API Responses

API responses are consistently structured using **Laravel Resources**. Each model (e.g., `Category`, `Post`) has a corresponding resource (e.g., `CategoryResource`, `PostResource`) to format the JSON response, enhancing API usability and readability.

## Installation

1. Clone the repository:
   ```bash
   git clone https://github.com/your-username/your-repo-name.git
   cd your-repo-name

