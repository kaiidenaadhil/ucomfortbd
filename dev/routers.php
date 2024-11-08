<?php

// customers of routes
$app->router->get('/customers', [CustomersController::class, 'customersIndex']);
$app->router->get('/customers/build', [CustomersController::class, 'customersBuild']);
$app->router->post('/customers/build', [CustomersController::class, 'customersRecord']);
$app->router->get('/customers/{customersIdentify}/destroy', [CustomersController::class, 'customersDestroy']);
$app->router->get('/customers/{customersIdentify}/modify', [CustomersController::class, 'customersModify']);
$app->router->post('/customers/{customersIdentify}/modify', [CustomersController::class, 'customersEdit']);
$app->router->get('/customers/{customersIdentify}', [CustomersController::class, 'customersDisplay']);

// customers of routes
$app->router->get('/customers', [CustomersController::class, 'customersIndex']);
$app->router->get('/customers/build', [CustomersController::class, 'customersBuild']);
$app->router->post('/customers/build', [CustomersController::class, 'customersRecord']);
$app->router->get('/customers/{customersIdentify}/destroy', [CustomersController::class, 'customersDestroy']);
$app->router->get('/customers/{customersIdentify}/modify', [CustomersController::class, 'customersModify']);
$app->router->post('/customers/{customersIdentify}/modify', [CustomersController::class, 'customersEdit']);
$app->router->get('/customers/{customersIdentify}', [CustomersController::class, 'customersDisplay']);

// customers of routes
$app->router->get('/customers', [CustomersController::class, 'customersIndex']);
$app->router->get('/customers/build', [CustomersController::class, 'customersBuild']);
$app->router->post('/customers/build', [CustomersController::class, 'customersRecord']);
$app->router->get('/customers/{customersIdentify}/destroy', [CustomersController::class, 'customersDestroy']);
$app->router->get('/customers/{customersIdentify}/modify', [CustomersController::class, 'customersModify']);
$app->router->post('/customers/{customersIdentify}/modify', [CustomersController::class, 'customersEdit']);
$app->router->get('/customers/{customersIdentify}', [CustomersController::class, 'customersDisplay']);

// customers of routes
$app->router->get('/customers', [CustomersController::class, 'customersIndex']);
$app->router->get('/customers/build', [CustomersController::class, 'customersBuild']);
$app->router->post('/customers/build', [CustomersController::class, 'customersRecord']);
$app->router->get('/customers/{customersIdentify}/destroy', [CustomersController::class, 'customersDestroy']);
$app->router->get('/customers/{customersIdentify}/modify', [CustomersController::class, 'customersModify']);
$app->router->post('/customers/{customersIdentify}/modify', [CustomersController::class, 'customersEdit']);
$app->router->get('/customers/{customersIdentify}', [CustomersController::class, 'customersDisplay']);

// customers of routes
$app->router->get('/customers', [CustomersController::class, 'customersIndex']);
$app->router->get('/customers/build', [CustomersController::class, 'customersBuild']);
$app->router->post('/customers/build', [CustomersController::class, 'customersRecord']);
$app->router->get('/customers/{customersIdentify}/destroy', [CustomersController::class, 'customersDestroy']);
$app->router->get('/customers/{customersIdentify}/modify', [CustomersController::class, 'customersModify']);
$app->router->post('/customers/{customersIdentify}/modify', [CustomersController::class, 'customersEdit']);
$app->router->get('/customers/{customersIdentify}', [CustomersController::class, 'customersDisplay']);

// caztamarz of routes
$app->router->get('/caztamarz', [CaztamarzController::class, 'caztamarzIndex']);
$app->router->get('/caztamarz/build', [CaztamarzController::class, 'caztamarzBuild']);
$app->router->post('/caztamarz/build', [CaztamarzController::class, 'caztamarzRecord']);
$app->router->get('/caztamarz/{caztamarzIdentify}/destroy', [CaztamarzController::class, 'caztamarzDestroy']);
$app->router->get('/caztamarz/{caztamarzIdentify}/modify', [CaztamarzController::class, 'caztamarzModify']);
$app->router->post('/caztamarz/{caztamarzIdentify}/modify', [CaztamarzController::class, 'caztamarzEdit']);
$app->router->get('/caztamarz/{caztamarzIdentify}', [CaztamarzController::class, 'caztamarzDisplay']);

// caztamarz of routes
$app->router->get('/caztamarz', [CaztamarzController::class, 'caztamarzIndex']);
$app->router->get('/caztamarz/build', [CaztamarzController::class, 'caztamarzBuild']);
$app->router->post('/caztamarz/build', [CaztamarzController::class, 'caztamarzRecord']);
$app->router->get('/caztamarz/{caztamarzIdentify}/destroy', [CaztamarzController::class, 'caztamarzDestroy']);
$app->router->get('/caztamarz/{caztamarzIdentify}/modify', [CaztamarzController::class, 'caztamarzModify']);
$app->router->post('/caztamarz/{caztamarzIdentify}/modify', [CaztamarzController::class, 'caztamarzEdit']);
$app->router->get('/caztamarz/{caztamarzIdentify}', [CaztamarzController::class, 'caztamarzDisplay']);

// orders of routes
$app->router->get('/orders', [OrdersController::class, 'ordersIndex']);
$app->router->get('/orders/build', [OrdersController::class, 'ordersBuild']);
$app->router->post('/orders/build', [OrdersController::class, 'ordersRecord']);
$app->router->get('/orders/{ordersIdentify}/destroy', [OrdersController::class, 'ordersDestroy']);
$app->router->get('/orders/{ordersIdentify}/modify', [OrdersController::class, 'ordersModify']);
$app->router->post('/orders/{ordersIdentify}/modify', [OrdersController::class, 'ordersEdit']);
$app->router->get('/orders/{ordersIdentify}', [OrdersController::class, 'ordersDisplay']);

// amin of routes
$app->router->get('/amin', [AminController::class, 'aminIndex']);
$app->router->get('/amin/build', [AminController::class, 'aminBuild']);
$app->router->post('/amin/build', [AminController::class, 'aminRecord']);
$app->router->get('/amin/{aminIdentify}/destroy', [AminController::class, 'aminDestroy']);
$app->router->get('/amin/{aminIdentify}/modify', [AminController::class, 'aminModify']);
$app->router->post('/amin/{aminIdentify}/modify', [AminController::class, 'aminEdit']);
$app->router->get('/amin/{aminIdentify}', [AminController::class, 'aminDisplay']);

// amin of routes
$app->router->get('/amin', [AminController::class, 'aminIndex']);
$app->router->get('/amin/build', [AminController::class, 'aminBuild']);
$app->router->post('/amin/build', [AminController::class, 'aminRecord']);
$app->router->get('/amin/{aminIdentify}/destroy', [AminController::class, 'aminDestroy']);
$app->router->get('/amin/{aminIdentify}/modify', [AminController::class, 'aminModify']);
$app->router->post('/amin/{aminIdentify}/modify', [AminController::class, 'aminEdit']);
$app->router->get('/amin/{aminIdentify}', [AminController::class, 'aminDisplay']);

// customers of routes
$app->router->get('/customers', [CustomersController::class, 'customersIndex']);
$app->router->get('/customers/build', [CustomersController::class, 'customersBuild']);
$app->router->post('/customers/build', [CustomersController::class, 'customersRecord']);
$app->router->get('/customers/{customersIdentify}/destroy', [CustomersController::class, 'customersDestroy']);
$app->router->get('/customers/{customersIdentify}/modify', [CustomersController::class, 'customersModify']);
$app->router->post('/customers/{customersIdentify}/modify', [CustomersController::class, 'customersEdit']);
$app->router->get('/customers/{customersIdentify}', [CustomersController::class, 'customersDisplay']);

// orders of routes
$app->router->get('/orders', [OrdersController::class, 'ordersIndex']);
$app->router->get('/orders/build', [OrdersController::class, 'ordersBuild']);
$app->router->post('/orders/build', [OrdersController::class, 'ordersRecord']);
$app->router->get('/orders/{ordersIdentify}/destroy', [OrdersController::class, 'ordersDestroy']);
$app->router->get('/orders/{ordersIdentify}/modify', [OrdersController::class, 'ordersModify']);
$app->router->post('/orders/{ordersIdentify}/modify', [OrdersController::class, 'ordersEdit']);
$app->router->get('/orders/{ordersIdentify}', [OrdersController::class, 'ordersDisplay']);

// orders of routes
$app->router->get('/orders', [OrdersController::class, 'ordersIndex']);
$app->router->get('/orders/build', [OrdersController::class, 'ordersBuild']);
$app->router->post('/orders/build', [OrdersController::class, 'ordersRecord']);
$app->router->get('/orders/{ordersIdentify}/destroy', [OrdersController::class, 'ordersDestroy']);
$app->router->get('/orders/{ordersIdentify}/modify', [OrdersController::class, 'ordersModify']);
$app->router->post('/orders/{ordersIdentify}/modify', [OrdersController::class, 'ordersEdit']);
$app->router->get('/orders/{ordersIdentify}', [OrdersController::class, 'ordersDisplay']);

// portfolios of routes
$app->router->get('/portfolios', [PortfoliosController::class, 'portfoliosIndex']);
$app->router->get('/portfolios/build', [PortfoliosController::class, 'portfoliosBuild']);
$app->router->post('/portfolios/build', [PortfoliosController::class, 'portfoliosRecord']);
$app->router->get('/portfolios/{portfoliosIdentify}/destroy', [PortfoliosController::class, 'portfoliosDestroy']);
$app->router->get('/portfolios/{portfoliosIdentify}/modify', [PortfoliosController::class, 'portfoliosModify']);
$app->router->post('/portfolios/{portfoliosIdentify}/modify', [PortfoliosController::class, 'portfoliosEdit']);
$app->router->get('/portfolios/{portfoliosIdentify}', [PortfoliosController::class, 'portfoliosDisplay']);

// books of routes
$app->router->get('/books', [BooksController::class, 'booksIndex']);
$app->router->get('/books/build', [BooksController::class, 'booksBuild']);
$app->router->post('/books/build', [BooksController::class, 'booksRecord']);
$app->router->get('/books/{booksIdentify}/destroy', [BooksController::class, 'booksDestroy']);
$app->router->get('/books/{booksIdentify}/modify', [BooksController::class, 'booksModify']);
$app->router->post('/books/{booksIdentify}/modify', [BooksController::class, 'booksEdit']);
$app->router->get('/books/{booksIdentify}', [BooksController::class, 'booksDisplay']);

// books of routes
$app->router->get('/books', [BooksController::class, 'booksIndex']);
$app->router->get('/books/build', [BooksController::class, 'booksBuild']);
$app->router->post('/books/build', [BooksController::class, 'booksRecord']);
$app->router->get('/books/{booksIdentify}/destroy', [BooksController::class, 'booksDestroy']);
$app->router->get('/books/{booksIdentify}/modify', [BooksController::class, 'booksModify']);
$app->router->post('/books/{booksIdentify}/modify', [BooksController::class, 'booksEdit']);
$app->router->get('/books/{booksIdentify}', [BooksController::class, 'booksDisplay']);

// books of routes
$app->router->get('/books', [BooksController::class, 'booksIndex']);
$app->router->get('/books/build', [BooksController::class, 'booksBuild']);
$app->router->post('/books/build', [BooksController::class, 'booksRecord']);
$app->router->get('/books/{booksIdentify}/destroy', [BooksController::class, 'booksDestroy']);
$app->router->get('/books/{booksIdentify}/modify', [BooksController::class, 'booksModify']);
$app->router->post('/books/{booksIdentify}/modify', [BooksController::class, 'booksEdit']);
$app->router->get('/books/{booksIdentify}', [BooksController::class, 'booksDisplay']);

// books of routes
$app->router->get('/books', [BooksController::class, 'booksIndex']);
$app->router->get('/books/build', [BooksController::class, 'booksBuild']);
$app->router->post('/books/build', [BooksController::class, 'booksRecord']);
$app->router->get('/books/{booksIdentify}/destroy', [BooksController::class, 'booksDestroy']);
$app->router->get('/books/{booksIdentify}/modify', [BooksController::class, 'booksModify']);
$app->router->post('/books/{booksIdentify}/modify', [BooksController::class, 'booksEdit']);
$app->router->get('/books/{booksIdentify}', [BooksController::class, 'booksDisplay']);

// transactions of routes
$app->router->get('/transactions', [TransactionsController::class, 'transactionsIndex']);
$app->router->get('/transactions/build', [TransactionsController::class, 'transactionsBuild']);
$app->router->post('/transactions/build', [TransactionsController::class, 'transactionsRecord']);
$app->router->get('/transactions/{transactionsIdentify}/destroy', [TransactionsController::class, 'transactionsDestroy']);
$app->router->get('/transactions/{transactionsIdentify}/modify', [TransactionsController::class, 'transactionsModify']);
$app->router->post('/transactions/{transactionsIdentify}/modify', [TransactionsController::class, 'transactionsEdit']);
$app->router->get('/transactions/{transactionsIdentify}', [TransactionsController::class, 'transactionsDisplay']);

// transactions of routes
$app->router->get('/transactions', [TransactionsController::class, 'transactionsIndex']);
$app->router->get('/transactions/build', [TransactionsController::class, 'transactionsBuild']);
$app->router->post('/transactions/build', [TransactionsController::class, 'transactionsRecord']);
$app->router->get('/transactions/{transactionsIdentify}/destroy', [TransactionsController::class, 'transactionsDestroy']);
$app->router->get('/transactions/{transactionsIdentify}/modify', [TransactionsController::class, 'transactionsModify']);
$app->router->post('/transactions/{transactionsIdentify}/modify', [TransactionsController::class, 'transactionsEdit']);
$app->router->get('/transactions/{transactionsIdentify}', [TransactionsController::class, 'transactionsDisplay']);

// transactions of routes
$app->router->get('/transactions', [TransactionsController::class, 'transactionsIndex']);
$app->router->get('/transactions/build', [TransactionsController::class, 'transactionsBuild']);
$app->router->post('/transactions/build', [TransactionsController::class, 'transactionsRecord']);
$app->router->get('/transactions/{transactionsIdentify}/destroy', [TransactionsController::class, 'transactionsDestroy']);
$app->router->get('/transactions/{transactionsIdentify}/modify', [TransactionsController::class, 'transactionsModify']);
$app->router->post('/transactions/{transactionsIdentify}/modify', [TransactionsController::class, 'transactionsEdit']);
$app->router->get('/transactions/{transactionsIdentify}', [TransactionsController::class, 'transactionsDisplay']);

// users of routes
$app->router->get('/users', [UsersController::class, 'usersIndex']);
$app->router->get('/users/build', [UsersController::class, 'usersBuild']);
$app->router->post('/users/build', [UsersController::class, 'usersRecord']);
$app->router->get('/users/{usersIdentify}/destroy', [UsersController::class, 'usersDestroy']);
$app->router->get('/users/{usersIdentify}/modify', [UsersController::class, 'usersModify']);
$app->router->post('/users/{usersIdentify}/modify', [UsersController::class, 'usersEdit']);
$app->router->get('/users/{usersIdentify}', [UsersController::class, 'usersDisplay']);

// users of routes
$app->router->get('/users', [UsersController::class, 'usersIndex']);
$app->router->get('/users/build', [UsersController::class, 'usersBuild']);
$app->router->post('/users/build', [UsersController::class, 'usersRecord']);
$app->router->get('/users/{usersIdentify}/destroy', [UsersController::class, 'usersDestroy']);
$app->router->get('/users/{usersIdentify}/modify', [UsersController::class, 'usersModify']);
$app->router->post('/users/{usersIdentify}/modify', [UsersController::class, 'usersEdit']);
$app->router->get('/users/{usersIdentify}', [UsersController::class, 'usersDisplay']);

// milestone of routes
$app->router->get('/milestone', [MilestoneController::class, 'milestoneIndex']);
$app->router->get('/milestone/build', [MilestoneController::class, 'milestoneBuild']);
$app->router->post('/milestone/build', [MilestoneController::class, 'milestoneRecord']);
$app->router->get('/milestone/{milestoneIdentify}/destroy', [MilestoneController::class, 'milestoneDestroy']);
$app->router->get('/milestone/{milestoneIdentify}/modify', [MilestoneController::class, 'milestoneModify']);
$app->router->post('/milestone/{milestoneIdentify}/modify', [MilestoneController::class, 'milestoneEdit']);
$app->router->get('/milestone/{milestoneIdentify}', [MilestoneController::class, 'milestoneDisplay']);

// milestone of routes
$app->router->get('/milestone', [MilestoneController::class, 'milestoneIndex']);
$app->router->get('/milestone/build', [MilestoneController::class, 'milestoneBuild']);
$app->router->post('/milestone/build', [MilestoneController::class, 'milestoneRecord']);
$app->router->get('/milestone/{milestoneIdentify}/destroy', [MilestoneController::class, 'milestoneDestroy']);
$app->router->get('/milestone/{milestoneIdentify}/modify', [MilestoneController::class, 'milestoneModify']);
$app->router->post('/milestone/{milestoneIdentify}/modify', [MilestoneController::class, 'milestoneEdit']);
$app->router->get('/milestone/{milestoneIdentify}', [MilestoneController::class, 'milestoneDisplay']);

// milestone of routes
$app->router->get('/milestone', [MilestoneController::class, 'milestoneIndex']);
$app->router->get('/milestone/build', [MilestoneController::class, 'milestoneBuild']);
$app->router->post('/milestone/build', [MilestoneController::class, 'milestoneRecord']);
$app->router->get('/milestone/{milestoneIdentify}/destroy', [MilestoneController::class, 'milestoneDestroy']);
$app->router->get('/milestone/{milestoneIdentify}/modify', [MilestoneController::class, 'milestoneModify']);
$app->router->post('/milestone/{milestoneIdentify}/modify', [MilestoneController::class, 'milestoneEdit']);
$app->router->get('/milestone/{milestoneIdentify}', [MilestoneController::class, 'milestoneDisplay']);

// milestone of routes
$app->router->get('/milestone', [MilestoneController::class, 'milestoneIndex']);
$app->router->get('/milestone/build', [MilestoneController::class, 'milestoneBuild']);
$app->router->post('/milestone/build', [MilestoneController::class, 'milestoneRecord']);
$app->router->get('/milestone/{milestoneIdentify}/destroy', [MilestoneController::class, 'milestoneDestroy']);
$app->router->get('/milestone/{milestoneIdentify}/modify', [MilestoneController::class, 'milestoneModify']);
$app->router->post('/milestone/{milestoneIdentify}/modify', [MilestoneController::class, 'milestoneEdit']);
$app->router->get('/milestone/{milestoneIdentify}', [MilestoneController::class, 'milestoneDisplay']);

// orders of routes
$app->router->get('/orders', [OrdersController::class, 'ordersIndex']);
$app->router->get('/orders/build', [OrdersController::class, 'ordersBuild']);
$app->router->post('/orders/build', [OrdersController::class, 'ordersRecord']);
$app->router->get('/orders/{ordersIdentify}/destroy', [OrdersController::class, 'ordersDestroy']);
$app->router->get('/orders/{ordersIdentify}/modify', [OrdersController::class, 'ordersModify']);
$app->router->post('/orders/{ordersIdentify}/modify', [OrdersController::class, 'ordersEdit']);
$app->router->get('/orders/{ordersIdentify}', [OrdersController::class, 'ordersDisplay']);

// orders of routes
$app->router->get('/orders', [OrdersController::class, 'ordersIndex']);
$app->router->get('/orders/build', [OrdersController::class, 'ordersBuild']);
$app->router->post('/orders/build', [OrdersController::class, 'ordersRecord']);
$app->router->get('/orders/{ordersIdentify}/destroy', [OrdersController::class, 'ordersDestroy']);
$app->router->get('/orders/{ordersIdentify}/modify', [OrdersController::class, 'ordersModify']);
$app->router->post('/orders/{ordersIdentify}/modify', [OrdersController::class, 'ordersEdit']);
$app->router->get('/orders/{ordersIdentify}', [OrdersController::class, 'ordersDisplay']);

// orders of routes
$app->router->get('/orders', [OrdersController::class, 'ordersIndex']);
$app->router->get('/orders/build', [OrdersController::class, 'ordersBuild']);
$app->router->post('/orders/build', [OrdersController::class, 'ordersRecord']);
$app->router->get('/orders/{ordersIdentify}/destroy', [OrdersController::class, 'ordersDestroy']);
$app->router->get('/orders/{ordersIdentify}/modify', [OrdersController::class, 'ordersModify']);
$app->router->post('/orders/{ordersIdentify}/modify', [OrdersController::class, 'ordersEdit']);
$app->router->get('/orders/{ordersIdentify}', [OrdersController::class, 'ordersDisplay']);

// orders of routes
$app->router->get('/orders', [OrdersController::class, 'ordersIndex']);
$app->router->get('/orders/build', [OrdersController::class, 'ordersBuild']);
$app->router->post('/orders/build', [OrdersController::class, 'ordersRecord']);
$app->router->get('/orders/{ordersIdentify}/destroy', [OrdersController::class, 'ordersDestroy']);
$app->router->get('/orders/{ordersIdentify}/modify', [OrdersController::class, 'ordersModify']);
$app->router->post('/orders/{ordersIdentify}/modify', [OrdersController::class, 'ordersEdit']);
$app->router->get('/orders/{ordersIdentify}', [OrdersController::class, 'ordersDisplay']);

// ordersd of routes
$app->router->get('/ordersd', [OrdersdController::class, 'ordersdIndex']);
$app->router->get('/ordersd/build', [OrdersdController::class, 'ordersdBuild']);
$app->router->post('/ordersd/build', [OrdersdController::class, 'ordersdRecord']);
$app->router->get('/ordersd/{ordersdIdentify}/destroy', [OrdersdController::class, 'ordersdDestroy']);
$app->router->get('/ordersd/{ordersdIdentify}/modify', [OrdersdController::class, 'ordersdModify']);
$app->router->post('/ordersd/{ordersdIdentify}/modify', [OrdersdController::class, 'ordersdEdit']);
$app->router->get('/ordersd/{ordersdIdentify}', [OrdersdController::class, 'ordersdDisplay']);

// orders of routes
$app->router->get('/orders', [OrdersController::class, 'ordersIndex']);
$app->router->get('/orders/build', [OrdersController::class, 'ordersBuild']);
$app->router->post('/orders/build', [OrdersController::class, 'ordersRecord']);
$app->router->get('/orders/{ordersIdentify}/destroy', [OrdersController::class, 'ordersDestroy']);
$app->router->get('/orders/{ordersIdentify}/modify', [OrdersController::class, 'ordersModify']);
$app->router->post('/orders/{ordersIdentify}/modify', [OrdersController::class, 'ordersEdit']);
$app->router->get('/orders/{ordersIdentify}', [OrdersController::class, 'ordersDisplay']);

// clients of routes
$app->router->get('/clients', [ClientsController::class, 'clientsIndex']);
$app->router->get('/clients/build', [ClientsController::class, 'clientsBuild']);
$app->router->post('/clients/build', [ClientsController::class, 'clientsRecord']);
$app->router->get('/clients/{clientsIdentify}/destroy', [ClientsController::class, 'clientsDestroy']);
$app->router->get('/clients/{clientsIdentify}/modify', [ClientsController::class, 'clientsModify']);
$app->router->post('/clients/{clientsIdentify}/modify', [ClientsController::class, 'clientsEdit']);
$app->router->get('/clients/{clientsIdentify}', [ClientsController::class, 'clientsDisplay']);

// faqs of routes
$app->router->get('/faqs', [FaqsController::class, 'faqsIndex']);
$app->router->get('/faqs/build', [FaqsController::class, 'faqsBuild']);
$app->router->post('/faqs/build', [FaqsController::class, 'faqsRecord']);
$app->router->get('/faqs/{faqsIdentify}/destroy', [FaqsController::class, 'faqsDestroy']);
$app->router->get('/faqs/{faqsIdentify}/modify', [FaqsController::class, 'faqsModify']);
$app->router->post('/faqs/{faqsIdentify}/modify', [FaqsController::class, 'faqsEdit']);
$app->router->get('/faqs/{faqsIdentify}', [FaqsController::class, 'faqsDisplay']);

// faqs of routes
$app->router->get('/faqs', [FaqsController::class, 'faqsIndex']);
$app->router->get('/faqs/build', [FaqsController::class, 'faqsBuild']);
$app->router->post('/faqs/build', [FaqsController::class, 'faqsRecord']);
$app->router->get('/faqs/{faqsIdentify}/destroy', [FaqsController::class, 'faqsDestroy']);
$app->router->get('/faqs/{faqsIdentify}/modify', [FaqsController::class, 'faqsModify']);
$app->router->post('/faqs/{faqsIdentify}/modify', [FaqsController::class, 'faqsEdit']);
$app->router->get('/faqs/{faqsIdentify}', [FaqsController::class, 'faqsDisplay']);

// iprojects of routes
$app->router->get('/iprojects', [IprojectsController::class, 'iprojectsIndex']);
$app->router->get('/iprojects/build', [IprojectsController::class, 'iprojectsBuild']);
$app->router->post('/iprojects/build', [IprojectsController::class, 'iprojectsRecord']);
$app->router->get('/iprojects/{iprojectsIdentify}/destroy', [IprojectsController::class, 'iprojectsDestroy']);
$app->router->get('/iprojects/{iprojectsIdentify}/modify', [IprojectsController::class, 'iprojectsModify']);
$app->router->post('/iprojects/{iprojectsIdentify}/modify', [IprojectsController::class, 'iprojectsEdit']);
$app->router->get('/iprojects/{iprojectsIdentify}', [IprojectsController::class, 'iprojectsDisplay']);

// factory of routes
$app->router->get('/factory', [FactoryController::class, 'factoryIndex']);
$app->router->get('/factory/build', [FactoryController::class, 'factoryBuild']);
$app->router->post('/factory/build', [FactoryController::class, 'factoryRecord']);
$app->router->get('/factory/{factoryIdentify}/destroy', [FactoryController::class, 'factoryDestroy']);
$app->router->get('/factory/{factoryIdentify}/modify', [FactoryController::class, 'factoryModify']);
$app->router->post('/factory/{factoryIdentify}/modify', [FactoryController::class, 'factoryEdit']);
$app->router->get('/factory/{factoryIdentify}', [FactoryController::class, 'factoryDisplay']);

// factories of routes
$app->router->get('/factories', [FactoriesController::class, 'factoriesIndex']);
$app->router->get('/factories/build', [FactoriesController::class, 'factoriesBuild']);
$app->router->post('/factories/build', [FactoriesController::class, 'factoriesRecord']);
$app->router->get('/factories/{factoriesIdentify}/destroy', [FactoriesController::class, 'factoriesDestroy']);
$app->router->get('/factories/{factoriesIdentify}/modify', [FactoriesController::class, 'factoriesModify']);
$app->router->post('/factories/{factoriesIdentify}/modify', [FactoriesController::class, 'factoriesEdit']);
$app->router->get('/factories/{factoriesIdentify}', [FactoriesController::class, 'factoriesDisplay']);

// factories of routes
$app->router->get('/factories', [FactoriesController::class, 'factoriesIndex']);
$app->router->get('/factories/build', [FactoriesController::class, 'factoriesBuild']);
$app->router->post('/factories/build', [FactoriesController::class, 'factoriesRecord']);
$app->router->get('/factories/{factoriesIdentify}/destroy', [FactoriesController::class, 'factoriesDestroy']);
$app->router->get('/factories/{factoriesIdentify}/modify', [FactoriesController::class, 'factoriesModify']);
$app->router->post('/factories/{factoriesIdentify}/modify', [FactoriesController::class, 'factoriesEdit']);
$app->router->get('/factories/{factoriesIdentify}', [FactoriesController::class, 'factoriesDisplay']);

// iprojects of routes
$app->router->get('/iprojects', [IprojectsController::class, 'iprojectsIndex']);
$app->router->get('/iprojects/build', [IprojectsController::class, 'iprojectsBuild']);
$app->router->post('/iprojects/build', [IprojectsController::class, 'iprojectsRecord']);
$app->router->get('/iprojects/{iprojectsIdentify}/destroy', [IprojectsController::class, 'iprojectsDestroy']);
$app->router->get('/iprojects/{iprojectsIdentify}/modify', [IprojectsController::class, 'iprojectsModify']);
$app->router->post('/iprojects/{iprojectsIdentify}/modify', [IprojectsController::class, 'iprojectsEdit']);
$app->router->get('/iprojects/{iprojectsIdentify}', [IprojectsController::class, 'iprojectsDisplay']);

// test of routes
$app->router->get('/test', [TestController::class, 'testIndex']);
$app->router->get('/test/build', [TestController::class, 'testBuild']);
$app->router->post('/test/build', [TestController::class, 'testRecord']);
$app->router->get('/test/{testIdentify}/destroy', [TestController::class, 'testDestroy']);
$app->router->get('/test/{testIdentify}/modify', [TestController::class, 'testModify']);
$app->router->post('/test/{testIdentify}/modify', [TestController::class, 'testEdit']);
$app->router->get('/test/{testIdentify}', [TestController::class, 'testDisplay']);

// faqs of routes
$app->router->get('/faqs', [FaqsController::class, 'faqsIndex']);
$app->router->get('/faqs/build', [FaqsController::class, 'faqsBuild']);
$app->router->post('/faqs/build', [FaqsController::class, 'faqsRecord']);
$app->router->get('/faqs/{faqsIdentify}/destroy', [FaqsController::class, 'faqsDestroy']);
$app->router->get('/faqs/{faqsIdentify}/modify', [FaqsController::class, 'faqsModify']);
$app->router->post('/faqs/{faqsIdentify}/modify', [FaqsController::class, 'faqsEdit']);
$app->router->get('/faqs/{faqsIdentify}', [FaqsController::class, 'faqsDisplay']);

// phone of routes
$app->router->get('/phone', [PhoneController::class, 'phoneIndex']);
$app->router->get('/phone/build', [PhoneController::class, 'phoneBuild']);
$app->router->post('/phone/build', [PhoneController::class, 'phoneRecord']);
$app->router->get('/phone/{phoneIdentify}/destroy', [PhoneController::class, 'phoneDestroy']);
$app->router->get('/phone/{phoneIdentify}/modify', [PhoneController::class, 'phoneModify']);
$app->router->post('/phone/{phoneIdentify}/modify', [PhoneController::class, 'phoneEdit']);
$app->router->get('/phone/{phoneIdentify}', [PhoneController::class, 'phoneDisplay']);

// phone of routes
$app->router->get('/phone', [PhoneController::class, 'phoneIndex']);
$app->router->get('/phone/build', [PhoneController::class, 'phoneBuild']);
$app->router->post('/phone/build', [PhoneController::class, 'phoneRecord']);
$app->router->get('/phone/{phoneIdentify}/destroy', [PhoneController::class, 'phoneDestroy']);
$app->router->get('/phone/{phoneIdentify}/modify', [PhoneController::class, 'phoneModify']);
$app->router->post('/phone/{phoneIdentify}/modify', [PhoneController::class, 'phoneEdit']);
$app->router->get('/phone/{phoneIdentify}', [PhoneController::class, 'phoneDisplay']);

// phone of routes
$app->router->get('/phone', [PhoneController::class, 'phoneIndex']);
$app->router->get('/phone/build', [PhoneController::class, 'phoneBuild']);
$app->router->post('/phone/build', [PhoneController::class, 'phoneRecord']);
$app->router->get('/phone/{phoneIdentify}/destroy', [PhoneController::class, 'phoneDestroy']);
$app->router->get('/phone/{phoneIdentify}/modify', [PhoneController::class, 'phoneModify']);
$app->router->post('/phone/{phoneIdentify}/modify', [PhoneController::class, 'phoneEdit']);
$app->router->get('/phone/{phoneIdentify}', [PhoneController::class, 'phoneDisplay']);

// phone of routes
$app->router->get('/phone', [PhoneController::class, 'phoneIndex']);
$app->router->get('/phone/build', [PhoneController::class, 'phoneBuild']);
$app->router->post('/phone/build', [PhoneController::class, 'phoneRecord']);
$app->router->get('/phone/{phoneIdentify}/destroy', [PhoneController::class, 'phoneDestroy']);
$app->router->get('/phone/{phoneIdentify}/modify', [PhoneController::class, 'phoneModify']);
$app->router->post('/phone/{phoneIdentify}/modify', [PhoneController::class, 'phoneEdit']);
$app->router->get('/phone/{phoneIdentify}', [PhoneController::class, 'phoneDisplay']);

// phone of routes
$app->router->get('/phone', [PhoneController::class, 'phoneIndex']);
$app->router->get('/phone/build', [PhoneController::class, 'phoneBuild']);
$app->router->post('/phone/build', [PhoneController::class, 'phoneRecord']);
$app->router->get('/phone/{phoneIdentify}/destroy', [PhoneController::class, 'phoneDestroy']);
$app->router->get('/phone/{phoneIdentify}/modify', [PhoneController::class, 'phoneModify']);
$app->router->post('/phone/{phoneIdentify}/modify', [PhoneController::class, 'phoneEdit']);
$app->router->get('/phone/{phoneIdentify}', [PhoneController::class, 'phoneDisplay']);

// phone of routes
$app->router->get('/phone', [PhoneController::class, 'phoneIndex']);
$app->router->get('/phone/build', [PhoneController::class, 'phoneBuild']);
$app->router->post('/phone/build', [PhoneController::class, 'phoneRecord']);
$app->router->get('/phone/{phoneIdentify}/destroy', [PhoneController::class, 'phoneDestroy']);
$app->router->get('/phone/{phoneIdentify}/modify', [PhoneController::class, 'phoneModify']);
$app->router->post('/phone/{phoneIdentify}/modify', [PhoneController::class, 'phoneEdit']);
$app->router->get('/phone/{phoneIdentify}', [PhoneController::class, 'phoneDisplay']);

// phone of routes
$app->router->get('/phone', [PhoneController::class, 'phoneIndex']);
$app->router->get('/phone/build', [PhoneController::class, 'phoneBuild']);
$app->router->post('/phone/build', [PhoneController::class, 'phoneRecord']);
$app->router->get('/phone/{phoneIdentify}/destroy', [PhoneController::class, 'phoneDestroy']);
$app->router->get('/phone/{phoneIdentify}/modify', [PhoneController::class, 'phoneModify']);
$app->router->post('/phone/{phoneIdentify}/modify', [PhoneController::class, 'phoneEdit']);
$app->router->get('/phone/{phoneIdentify}', [PhoneController::class, 'phoneDisplay']);

// phone of routes
$app->router->get('/phone', [PhoneController::class, 'phoneIndex']);
$app->router->get('/phone/build', [PhoneController::class, 'phoneBuild']);
$app->router->post('/phone/build', [PhoneController::class, 'phoneRecord']);
$app->router->get('/phone/{phoneIdentify}/destroy', [PhoneController::class, 'phoneDestroy']);
$app->router->get('/phone/{phoneIdentify}/modify', [PhoneController::class, 'phoneModify']);
$app->router->post('/phone/{phoneIdentify}/modify', [PhoneController::class, 'phoneEdit']);
$app->router->get('/phone/{phoneIdentify}', [PhoneController::class, 'phoneDisplay']);

// phone of routes
$app->router->get('/phone', [PhoneController::class, 'phoneIndex']);
$app->router->get('/phone/build', [PhoneController::class, 'phoneBuild']);
$app->router->post('/phone/build', [PhoneController::class, 'phoneRecord']);
$app->router->get('/phone/{phoneIdentify}/destroy', [PhoneController::class, 'phoneDestroy']);
$app->router->get('/phone/{phoneIdentify}/modify', [PhoneController::class, 'phoneModify']);
$app->router->post('/phone/{phoneIdentify}/modify', [PhoneController::class, 'phoneEdit']);
$app->router->get('/phone/{phoneIdentify}', [PhoneController::class, 'phoneDisplay']);

// phone of routes
$app->router->get('/phone', [PhoneController::class, 'phoneIndex']);
$app->router->get('/phone/build', [PhoneController::class, 'phoneBuild']);
$app->router->post('/phone/build', [PhoneController::class, 'phoneRecord']);
$app->router->get('/phone/{phoneIdentify}/destroy', [PhoneController::class, 'phoneDestroy']);
$app->router->get('/phone/{phoneIdentify}/modify', [PhoneController::class, 'phoneModify']);
$app->router->post('/phone/{phoneIdentify}/modify', [PhoneController::class, 'phoneEdit']);
$app->router->get('/phone/{phoneIdentify}', [PhoneController::class, 'phoneDisplay']);

// phone of routes
$app->router->get('/phone', [PhoneController::class, 'phoneIndex']);
$app->router->get('/phone/build', [PhoneController::class, 'phoneBuild']);
$app->router->post('/phone/build', [PhoneController::class, 'phoneRecord']);
$app->router->get('/phone/{phoneIdentify}/destroy', [PhoneController::class, 'phoneDestroy']);
$app->router->get('/phone/{phoneIdentify}/modify', [PhoneController::class, 'phoneModify']);
$app->router->post('/phone/{phoneIdentify}/modify', [PhoneController::class, 'phoneEdit']);
$app->router->get('/phone/{phoneIdentify}', [PhoneController::class, 'phoneDisplay']);

// phone of routes
$app->router->get('/phone', [PhoneController::class, 'phoneIndex']);
$app->router->get('/phone/build', [PhoneController::class, 'phoneBuild']);
$app->router->post('/phone/build', [PhoneController::class, 'phoneRecord']);
$app->router->get('/phone/{phoneIdentify}/destroy', [PhoneController::class, 'phoneDestroy']);
$app->router->get('/phone/{phoneIdentify}/modify', [PhoneController::class, 'phoneModify']);
$app->router->post('/phone/{phoneIdentify}/modify', [PhoneController::class, 'phoneEdit']);
$app->router->get('/phone/{phoneIdentify}', [PhoneController::class, 'phoneDisplay']);

// phone of routes
$app->router->get('/phone', [PhoneController::class, 'phoneIndex']);
$app->router->get('/phone/build', [PhoneController::class, 'phoneBuild']);
$app->router->post('/phone/build', [PhoneController::class, 'phoneRecord']);
$app->router->get('/phone/{phoneIdentify}/destroy', [PhoneController::class, 'phoneDestroy']);
$app->router->get('/phone/{phoneIdentify}/modify', [PhoneController::class, 'phoneModify']);
$app->router->post('/phone/{phoneIdentify}/modify', [PhoneController::class, 'phoneEdit']);
$app->router->get('/phone/{phoneIdentify}', [PhoneController::class, 'phoneDisplay']);

// phone of routes
$app->router->get('/phone', [PhoneController::class, 'phoneIndex']);
$app->router->get('/phone/build', [PhoneController::class, 'phoneBuild']);
$app->router->post('/phone/build', [PhoneController::class, 'phoneRecord']);
$app->router->get('/phone/{phoneIdentify}/destroy', [PhoneController::class, 'phoneDestroy']);
$app->router->get('/phone/{phoneIdentify}/modify', [PhoneController::class, 'phoneModify']);
$app->router->post('/phone/{phoneIdentify}/modify', [PhoneController::class, 'phoneEdit']);
$app->router->get('/phone/{phoneIdentify}', [PhoneController::class, 'phoneDisplay']);

// phone of routes
$app->router->get('/phone', [PhoneController::class, 'phoneIndex']);
$app->router->get('/phone/build', [PhoneController::class, 'phoneBuild']);
$app->router->post('/phone/build', [PhoneController::class, 'phoneRecord']);
$app->router->get('/phone/{phoneIdentify}/destroy', [PhoneController::class, 'phoneDestroy']);
$app->router->get('/phone/{phoneIdentify}/modify', [PhoneController::class, 'phoneModify']);
$app->router->post('/phone/{phoneIdentify}/modify', [PhoneController::class, 'phoneEdit']);
$app->router->get('/phone/{phoneIdentify}', [PhoneController::class, 'phoneDisplay']);

// phone of routes
$app->router->get('/phone', [PhoneController::class, 'phoneIndex']);
$app->router->get('/phone/build', [PhoneController::class, 'phoneBuild']);
$app->router->post('/phone/build', [PhoneController::class, 'phoneRecord']);
$app->router->get('/phone/{phoneIdentify}/destroy', [PhoneController::class, 'phoneDestroy']);
$app->router->get('/phone/{phoneIdentify}/modify', [PhoneController::class, 'phoneModify']);
$app->router->post('/phone/{phoneIdentify}/modify', [PhoneController::class, 'phoneEdit']);
$app->router->get('/phone/{phoneIdentify}', [PhoneController::class, 'phoneDisplay']);

// phone of routes
$app->router->get('/phone', [PhoneController::class, 'phoneIndex']);
$app->router->get('/phone/build', [PhoneController::class, 'phoneBuild']);
$app->router->post('/phone/build', [PhoneController::class, 'phoneRecord']);
$app->router->get('/phone/{phoneIdentify}/destroy', [PhoneController::class, 'phoneDestroy']);
$app->router->get('/phone/{phoneIdentify}/modify', [PhoneController::class, 'phoneModify']);
$app->router->post('/phone/{phoneIdentify}/modify', [PhoneController::class, 'phoneEdit']);
$app->router->get('/phone/{phoneIdentify}', [PhoneController::class, 'phoneDisplay']);

// phone of routes
$app->router->get('/phone', [PhoneController::class, 'phoneIndex']);
$app->router->get('/phone/build', [PhoneController::class, 'phoneBuild']);
$app->router->post('/phone/build', [PhoneController::class, 'phoneRecord']);
$app->router->get('/phone/{phoneIdentify}/destroy', [PhoneController::class, 'phoneDestroy']);
$app->router->get('/phone/{phoneIdentify}/modify', [PhoneController::class, 'phoneModify']);
$app->router->post('/phone/{phoneIdentify}/modify', [PhoneController::class, 'phoneEdit']);
$app->router->get('/phone/{phoneIdentify}', [PhoneController::class, 'phoneDisplay']);

// phone of routes
$app->router->get('/phone', [PhoneController::class, 'phoneIndex']);
$app->router->get('/phone/build', [PhoneController::class, 'phoneBuild']);
$app->router->post('/phone/build', [PhoneController::class, 'phoneRecord']);
$app->router->get('/phone/{phoneIdentify}/destroy', [PhoneController::class, 'phoneDestroy']);
$app->router->get('/phone/{phoneIdentify}/modify', [PhoneController::class, 'phoneModify']);
$app->router->post('/phone/{phoneIdentify}/modify', [PhoneController::class, 'phoneEdit']);
$app->router->get('/phone/{phoneIdentify}', [PhoneController::class, 'phoneDisplay']);

// phone of routes
$app->router->get('/phone', [PhoneController::class, 'phoneIndex']);
$app->router->get('/phone/build', [PhoneController::class, 'phoneBuild']);
$app->router->post('/phone/build', [PhoneController::class, 'phoneRecord']);
$app->router->get('/phone/{phoneIdentify}/destroy', [PhoneController::class, 'phoneDestroy']);
$app->router->get('/phone/{phoneIdentify}/modify', [PhoneController::class, 'phoneModify']);
$app->router->post('/phone/{phoneIdentify}/modify', [PhoneController::class, 'phoneEdit']);
$app->router->get('/phone/{phoneIdentify}', [PhoneController::class, 'phoneDisplay']);

// phone of routes
$app->router->get('/phone', [PhoneController::class, 'phoneIndex']);
$app->router->get('/phone/build', [PhoneController::class, 'phoneBuild']);
$app->router->post('/phone/build', [PhoneController::class, 'phoneRecord']);
$app->router->get('/phone/{phoneIdentify}/destroy', [PhoneController::class, 'phoneDestroy']);
$app->router->get('/phone/{phoneIdentify}/modify', [PhoneController::class, 'phoneModify']);
$app->router->post('/phone/{phoneIdentify}/modify', [PhoneController::class, 'phoneEdit']);
$app->router->get('/phone/{phoneIdentify}', [PhoneController::class, 'phoneDisplay']);

// phone of routes
$app->router->get('/phone', [PhoneController::class, 'phoneIndex']);
$app->router->get('/phone/build', [PhoneController::class, 'phoneBuild']);
$app->router->post('/phone/build', [PhoneController::class, 'phoneRecord']);
$app->router->get('/phone/{phoneIdentify}/destroy', [PhoneController::class, 'phoneDestroy']);
$app->router->get('/phone/{phoneIdentify}/modify', [PhoneController::class, 'phoneModify']);
$app->router->post('/phone/{phoneIdentify}/modify', [PhoneController::class, 'phoneEdit']);
$app->router->get('/phone/{phoneIdentify}', [PhoneController::class, 'phoneDisplay']);

// phone of routes
$app->router->get('/phone', [PhoneController::class, 'phoneIndex']);
$app->router->get('/phone/build', [PhoneController::class, 'phoneBuild']);
$app->router->post('/phone/build', [PhoneController::class, 'phoneRecord']);
$app->router->get('/phone/{phoneIdentify}/destroy', [PhoneController::class, 'phoneDestroy']);
$app->router->get('/phone/{phoneIdentify}/modify', [PhoneController::class, 'phoneModify']);
$app->router->post('/phone/{phoneIdentify}/modify', [PhoneController::class, 'phoneEdit']);
$app->router->get('/phone/{phoneIdentify}', [PhoneController::class, 'phoneDisplay']);

// phone of routes
$app->router->get('/phone', [PhoneController::class, 'phoneIndex']);
$app->router->get('/phone/build', [PhoneController::class, 'phoneBuild']);
$app->router->post('/phone/build', [PhoneController::class, 'phoneRecord']);
$app->router->get('/phone/{phoneIdentify}/destroy', [PhoneController::class, 'phoneDestroy']);
$app->router->get('/phone/{phoneIdentify}/modify', [PhoneController::class, 'phoneModify']);
$app->router->post('/phone/{phoneIdentify}/modify', [PhoneController::class, 'phoneEdit']);
$app->router->get('/phone/{phoneIdentify}', [PhoneController::class, 'phoneDisplay']);

// phone of routes
$app->router->get('/phone', [PhoneController::class, 'phoneIndex']);
$app->router->get('/phone/build', [PhoneController::class, 'phoneBuild']);
$app->router->post('/phone/build', [PhoneController::class, 'phoneRecord']);
$app->router->get('/phone/{phoneIdentify}/destroy', [PhoneController::class, 'phoneDestroy']);
$app->router->get('/phone/{phoneIdentify}/modify', [PhoneController::class, 'phoneModify']);
$app->router->post('/phone/{phoneIdentify}/modify', [PhoneController::class, 'phoneEdit']);
$app->router->get('/phone/{phoneIdentify}', [PhoneController::class, 'phoneDisplay']);

// phone of routes
$app->router->get('/phone', [PhoneController::class, 'phoneIndex']);
$app->router->get('/phone/build', [PhoneController::class, 'phoneBuild']);
$app->router->post('/phone/build', [PhoneController::class, 'phoneRecord']);
$app->router->get('/phone/{phoneIdentify}/destroy', [PhoneController::class, 'phoneDestroy']);
$app->router->get('/phone/{phoneIdentify}/modify', [PhoneController::class, 'phoneModify']);
$app->router->post('/phone/{phoneIdentify}/modify', [PhoneController::class, 'phoneEdit']);
$app->router->get('/phone/{phoneIdentify}', [PhoneController::class, 'phoneDisplay']);

// phone of routes
$app->router->get('/phone', [PhoneController::class, 'phoneIndex']);
$app->router->get('/phone/build', [PhoneController::class, 'phoneBuild']);
$app->router->post('/phone/build', [PhoneController::class, 'phoneRecord']);
$app->router->get('/phone/{phoneIdentify}/destroy', [PhoneController::class, 'phoneDestroy']);
$app->router->get('/phone/{phoneIdentify}/modify', [PhoneController::class, 'phoneModify']);
$app->router->post('/phone/{phoneIdentify}/modify', [PhoneController::class, 'phoneEdit']);
$app->router->get('/phone/{phoneIdentify}', [PhoneController::class, 'phoneDisplay']);

// phone of routes
$app->router->get('/phone', [PhoneController::class, 'phoneIndex']);
$app->router->get('/phone/build', [PhoneController::class, 'phoneBuild']);
$app->router->post('/phone/build', [PhoneController::class, 'phoneRecord']);
$app->router->get('/phone/{phoneIdentify}/destroy', [PhoneController::class, 'phoneDestroy']);
$app->router->get('/phone/{phoneIdentify}/modify', [PhoneController::class, 'phoneModify']);
$app->router->post('/phone/{phoneIdentify}/modify', [PhoneController::class, 'phoneEdit']);
$app->router->get('/phone/{phoneIdentify}', [PhoneController::class, 'phoneDisplay']);

// phone of routes
$app->router->get('/phone', [PhoneController::class, 'phoneIndex']);
$app->router->get('/phone/build', [PhoneController::class, 'phoneBuild']);
$app->router->post('/phone/build', [PhoneController::class, 'phoneRecord']);
$app->router->get('/phone/{phoneIdentify}/destroy', [PhoneController::class, 'phoneDestroy']);
$app->router->get('/phone/{phoneIdentify}/modify', [PhoneController::class, 'phoneModify']);
$app->router->post('/phone/{phoneIdentify}/modify', [PhoneController::class, 'phoneEdit']);
$app->router->get('/phone/{phoneIdentify}', [PhoneController::class, 'phoneDisplay']);

// phone of routes
$app->router->get('/phone', [PhoneController::class, 'phoneIndex']);
$app->router->get('/phone/build', [PhoneController::class, 'phoneBuild']);
$app->router->post('/phone/build', [PhoneController::class, 'phoneRecord']);
$app->router->get('/phone/{phoneIdentify}/destroy', [PhoneController::class, 'phoneDestroy']);
$app->router->get('/phone/{phoneIdentify}/modify', [PhoneController::class, 'phoneModify']);
$app->router->post('/phone/{phoneIdentify}/modify', [PhoneController::class, 'phoneEdit']);
$app->router->get('/phone/{phoneIdentify}', [PhoneController::class, 'phoneDisplay']);

// phone of routes
$app->router->get('/phone', [PhoneController::class, 'phoneIndex']);
$app->router->get('/phone/build', [PhoneController::class, 'phoneBuild']);
$app->router->post('/phone/build', [PhoneController::class, 'phoneRecord']);
$app->router->get('/phone/{phoneIdentify}/destroy', [PhoneController::class, 'phoneDestroy']);
$app->router->get('/phone/{phoneIdentify}/modify', [PhoneController::class, 'phoneModify']);
$app->router->post('/phone/{phoneIdentify}/modify', [PhoneController::class, 'phoneEdit']);
$app->router->get('/phone/{phoneIdentify}', [PhoneController::class, 'phoneDisplay']);

// phone of routes
$app->router->get('/phone', [PhoneController::class, 'phoneIndex']);
$app->router->get('/phone/build', [PhoneController::class, 'phoneBuild']);
$app->router->post('/phone/build', [PhoneController::class, 'phoneRecord']);
$app->router->get('/phone/{phoneIdentify}/destroy', [PhoneController::class, 'phoneDestroy']);
$app->router->get('/phone/{phoneIdentify}/modify', [PhoneController::class, 'phoneModify']);
$app->router->post('/phone/{phoneIdentify}/modify', [PhoneController::class, 'phoneEdit']);
$app->router->get('/phone/{phoneIdentify}', [PhoneController::class, 'phoneDisplay']);

// phone of routes
$app->router->get('/phone', [PhoneController::class, 'phoneIndex']);
$app->router->get('/phone/build', [PhoneController::class, 'phoneBuild']);
$app->router->post('/phone/build', [PhoneController::class, 'phoneRecord']);
$app->router->get('/phone/{phoneIdentify}/destroy', [PhoneController::class, 'phoneDestroy']);
$app->router->get('/phone/{phoneIdentify}/modify', [PhoneController::class, 'phoneModify']);
$app->router->post('/phone/{phoneIdentify}/modify', [PhoneController::class, 'phoneEdit']);
$app->router->get('/phone/{phoneIdentify}', [PhoneController::class, 'phoneDisplay']);

// phone of routes
$app->router->get('/phone', [PhoneController::class, 'phoneIndex']);
$app->router->get('/phone/build', [PhoneController::class, 'phoneBuild']);
$app->router->post('/phone/build', [PhoneController::class, 'phoneRecord']);
$app->router->get('/phone/{phoneIdentify}/destroy', [PhoneController::class, 'phoneDestroy']);
$app->router->get('/phone/{phoneIdentify}/modify', [PhoneController::class, 'phoneModify']);
$app->router->post('/phone/{phoneIdentify}/modify', [PhoneController::class, 'phoneEdit']);
$app->router->get('/phone/{phoneIdentify}', [PhoneController::class, 'phoneDisplay']);

// uproduct of routes
$app->router->get('/uproduct', [UproductController::class, 'uproductIndex']);
$app->router->get('/uproduct/build', [UproductController::class, 'uproductBuild']);
$app->router->post('/uproduct/build', [UproductController::class, 'uproductRecord']);
$app->router->get('/uproduct/{uproductIdentify}/destroy', [UproductController::class, 'uproductDestroy']);
$app->router->get('/uproduct/{uproductIdentify}/modify', [UproductController::class, 'uproductModify']);
$app->router->post('/uproduct/{uproductIdentify}/modify', [UproductController::class, 'uproductEdit']);
$app->router->get('/uproduct/{uproductIdentify}', [UproductController::class, 'uproductDisplay']);

// network of routes
$app->router->get('/network', [NetworkController::class, 'networkIndex']);
$app->router->get('/network/build', [NetworkController::class, 'networkBuild']);
$app->router->post('/network/build', [NetworkController::class, 'networkRecord']);
$app->router->get('/network/{networkIdentify}/destroy', [NetworkController::class, 'networkDestroy']);
$app->router->get('/network/{networkIdentify}/modify', [NetworkController::class, 'networkModify']);
$app->router->post('/network/{networkIdentify}/modify', [NetworkController::class, 'networkEdit']);
$app->router->get('/network/{networkIdentify}', [NetworkController::class, 'networkDisplay']);

// network of routes
$app->router->get('/network', [NetworkController::class, 'networkIndex']);
$app->router->get('/network/build', [NetworkController::class, 'networkBuild']);
$app->router->post('/network/build', [NetworkController::class, 'networkRecord']);
$app->router->get('/network/{networkIdentify}/destroy', [NetworkController::class, 'networkDestroy']);
$app->router->get('/network/{networkIdentify}/modify', [NetworkController::class, 'networkModify']);
$app->router->post('/network/{networkIdentify}/modify', [NetworkController::class, 'networkEdit']);
$app->router->get('/network/{networkIdentify}', [NetworkController::class, 'networkDisplay']);

// network of routes
$app->router->get('/network', [NetworkController::class, 'networkIndex']);
$app->router->get('/network/build', [NetworkController::class, 'networkBuild']);
$app->router->post('/network/build', [NetworkController::class, 'networkRecord']);
$app->router->get('/network/{networkIdentify}/destroy', [NetworkController::class, 'networkDestroy']);
$app->router->get('/network/{networkIdentify}/modify', [NetworkController::class, 'networkModify']);
$app->router->post('/network/{networkIdentify}/modify', [NetworkController::class, 'networkEdit']);
$app->router->get('/network/{networkIdentify}', [NetworkController::class, 'networkDisplay']);

// network of routes
$app->router->get('/network', [NetworkController::class, 'networkIndex']);
$app->router->get('/network/build', [NetworkController::class, 'networkBuild']);
$app->router->post('/network/build', [NetworkController::class, 'networkRecord']);
$app->router->get('/network/{networkIdentify}/destroy', [NetworkController::class, 'networkDestroy']);
$app->router->get('/network/{networkIdentify}/modify', [NetworkController::class, 'networkModify']);
$app->router->post('/network/{networkIdentify}/modify', [NetworkController::class, 'networkEdit']);
$app->router->get('/network/{networkIdentify}', [NetworkController::class, 'networkDisplay']);

// network of routes
$app->router->get('/network', [NetworkController::class, 'networkIndex']);
$app->router->get('/network/build', [NetworkController::class, 'networkBuild']);
$app->router->post('/network/build', [NetworkController::class, 'networkRecord']);
$app->router->get('/network/{networkIdentify}/destroy', [NetworkController::class, 'networkDestroy']);
$app->router->get('/network/{networkIdentify}/modify', [NetworkController::class, 'networkModify']);
$app->router->post('/network/{networkIdentify}/modify', [NetworkController::class, 'networkEdit']);
$app->router->get('/network/{networkIdentify}', [NetworkController::class, 'networkDisplay']);

// network of routes
$app->router->get('/network', [NetworkController::class, 'networkIndex']);
$app->router->get('/network/build', [NetworkController::class, 'networkBuild']);
$app->router->post('/network/build', [NetworkController::class, 'networkRecord']);
$app->router->get('/network/{networkIdentify}/destroy', [NetworkController::class, 'networkDestroy']);
$app->router->get('/network/{networkIdentify}/modify', [NetworkController::class, 'networkModify']);
$app->router->post('/network/{networkIdentify}/modify', [NetworkController::class, 'networkEdit']);
$app->router->get('/network/{networkIdentify}', [NetworkController::class, 'networkDisplay']);

// network of routes
$app->router->get('/network', [NetworkController::class, 'networkIndex']);
$app->router->get('/network/build', [NetworkController::class, 'networkBuild']);
$app->router->post('/network/build', [NetworkController::class, 'networkRecord']);
$app->router->get('/network/{networkIdentify}/destroy', [NetworkController::class, 'networkDestroy']);
$app->router->get('/network/{networkIdentify}/modify', [NetworkController::class, 'networkModify']);
$app->router->post('/network/{networkIdentify}/modify', [NetworkController::class, 'networkEdit']);
$app->router->get('/network/{networkIdentify}', [NetworkController::class, 'networkDisplay']);

// campaign of routes
$app->router->get('/campaign', [CampaignController::class, 'campaignIndex']);
$app->router->get('/campaign/build', [CampaignController::class, 'campaignBuild']);
$app->router->post('/campaign/build', [CampaignController::class, 'campaignRecord']);
$app->router->get('/campaign/{campaignIdentify}/destroy', [CampaignController::class, 'campaignDestroy']);
$app->router->get('/campaign/{campaignIdentify}/modify', [CampaignController::class, 'campaignModify']);
$app->router->post('/campaign/{campaignIdentify}/modify', [CampaignController::class, 'campaignEdit']);
$app->router->get('/campaign/{campaignIdentify}', [CampaignController::class, 'campaignDisplay']);

// campaign of routes
$app->router->get('/campaign', [CampaignController::class, 'campaignIndex']);
$app->router->get('/campaign/build', [CampaignController::class, 'campaignBuild']);
$app->router->post('/campaign/build', [CampaignController::class, 'campaignRecord']);
$app->router->get('/campaign/{campaignIdentify}/destroy', [CampaignController::class, 'campaignDestroy']);
$app->router->get('/campaign/{campaignIdentify}/modify', [CampaignController::class, 'campaignModify']);
$app->router->post('/campaign/{campaignIdentify}/modify', [CampaignController::class, 'campaignEdit']);
$app->router->get('/campaign/{campaignIdentify}', [CampaignController::class, 'campaignDisplay']);

// campaign of routes
$app->router->get('/campaign', [CampaignController::class, 'campaignIndex']);
$app->router->get('/campaign/build', [CampaignController::class, 'campaignBuild']);
$app->router->post('/campaign/build', [CampaignController::class, 'campaignRecord']);
$app->router->get('/campaign/{campaignIdentify}/destroy', [CampaignController::class, 'campaignDestroy']);
$app->router->get('/campaign/{campaignIdentify}/modify', [CampaignController::class, 'campaignModify']);
$app->router->post('/campaign/{campaignIdentify}/modify', [CampaignController::class, 'campaignEdit']);
$app->router->get('/campaign/{campaignIdentify}', [CampaignController::class, 'campaignDisplay']);

// products of routes
$app->router->get('/products', [ProductsController::class, 'productsIndex']);
$app->router->get('/products/build', [ProductsController::class, 'productsBuild']);
$app->router->post('/products/build', [ProductsController::class, 'productsRecord']);
$app->router->get('/products/{productsIdentify}/destroy', [ProductsController::class, 'productsDestroy']);
$app->router->get('/products/{productsIdentify}/modify', [ProductsController::class, 'productsModify']);
$app->router->post('/products/{productsIdentify}/modify', [ProductsController::class, 'productsEdit']);
$app->router->get('/products/{productsIdentify}', [ProductsController::class, 'productsDisplay']);

// networks of routes
$app->router->get('/networks', [NetworksController::class, 'networksIndex']);
$app->router->get('/networks/build', [NetworksController::class, 'networksBuild']);
$app->router->post('/networks/build', [NetworksController::class, 'networksRecord']);
$app->router->get('/networks/{networksIdentify}/destroy', [NetworksController::class, 'networksDestroy']);
$app->router->get('/networks/{networksIdentify}/modify', [NetworksController::class, 'networksModify']);
$app->router->post('/networks/{networksIdentify}/modify', [NetworksController::class, 'networksEdit']);
$app->router->get('/networks/{networksIdentify}', [NetworksController::class, 'networksDisplay']);

// projects of routes
$app->router->get('/projects', [ProjectsController::class, 'projectsIndex']);
$app->router->get('/projects/build', [ProjectsController::class, 'projectsBuild']);
$app->router->post('/projects/build', [ProjectsController::class, 'projectsRecord']);
$app->router->get('/projects/{projectsIdentify}/destroy', [ProjectsController::class, 'projectsDestroy']);
$app->router->get('/projects/{projectsIdentify}/modify', [ProjectsController::class, 'projectsModify']);
$app->router->post('/projects/{projectsIdentify}/modify', [ProjectsController::class, 'projectsEdit']);
$app->router->get('/projects/{projectsIdentify}', [ProjectsController::class, 'projectsDisplay']);

// faqs of routes
$app->router->get('/faqs', [FaqsController::class, 'faqsIndex']);
$app->router->get('/faqs/build', [FaqsController::class, 'faqsBuild']);
$app->router->post('/faqs/build', [FaqsController::class, 'faqsRecord']);
$app->router->get('/faqs/{faqsIdentify}/destroy', [FaqsController::class, 'faqsDestroy']);
$app->router->get('/faqs/{faqsIdentify}/modify', [FaqsController::class, 'faqsModify']);
$app->router->post('/faqs/{faqsIdentify}/modify', [FaqsController::class, 'faqsEdit']);
$app->router->get('/faqs/{faqsIdentify}', [FaqsController::class, 'faqsDisplay']);

// clients of routes
$app->router->get('/clients', [ClientsController::class, 'clientsIndex']);
$app->router->get('/clients/build', [ClientsController::class, 'clientsBuild']);
$app->router->post('/clients/build', [ClientsController::class, 'clientsRecord']);
$app->router->get('/clients/{clientsIdentify}/destroy', [ClientsController::class, 'clientsDestroy']);
$app->router->get('/clients/{clientsIdentify}/modify', [ClientsController::class, 'clientsModify']);
$app->router->post('/clients/{clientsIdentify}/modify', [ClientsController::class, 'clientsEdit']);
$app->router->get('/clients/{clientsIdentify}', [ClientsController::class, 'clientsDisplay']);

// blog of routes
$app->router->get('/blog', [BlogController::class, 'blogIndex']);
$app->router->get('/blog/build', [BlogController::class, 'blogBuild']);
$app->router->post('/blog/build', [BlogController::class, 'blogRecord']);
$app->router->get('/blog/{blogIdentify}/destroy', [BlogController::class, 'blogDestroy']);
$app->router->get('/blog/{blogIdentify}/modify', [BlogController::class, 'blogModify']);
$app->router->post('/blog/{blogIdentify}/modify', [BlogController::class, 'blogEdit']);
$app->router->get('/blog/{blogIdentify}', [BlogController::class, 'blogDisplay']);

// network of routes
$app->router->get('/network', [NetworkController::class, 'networkIndex']);
$app->router->get('/network/build', [NetworkController::class, 'networkBuild']);
$app->router->post('/network/build', [NetworkController::class, 'networkRecord']);
$app->router->get('/network/{networkIdentify}/destroy', [NetworkController::class, 'networkDestroy']);
$app->router->get('/network/{networkIdentify}/modify', [NetworkController::class, 'networkModify']);
$app->router->post('/network/{networkIdentify}/modify', [NetworkController::class, 'networkEdit']);
$app->router->get('/network/{networkIdentify}', [NetworkController::class, 'networkDisplay']);

// network of routes
$app->router->get('/network', [NetworkController::class, 'networkIndex']);
$app->router->get('/network/build', [NetworkController::class, 'networkBuild']);
$app->router->post('/network/build', [NetworkController::class, 'networkRecord']);
$app->router->get('/network/{networkIdentify}/destroy', [NetworkController::class, 'networkDestroy']);
$app->router->get('/network/{networkIdentify}/modify', [NetworkController::class, 'networkModify']);
$app->router->post('/network/{networkIdentify}/modify', [NetworkController::class, 'networkEdit']);
$app->router->get('/network/{networkIdentify}', [NetworkController::class, 'networkDisplay']);

// network of routes
$app->router->get('/network', [NetworkController::class, 'networkIndex']);
$app->router->get('/network/build', [NetworkController::class, 'networkBuild']);
$app->router->post('/network/build', [NetworkController::class, 'networkRecord']);
$app->router->get('/network/{networkIdentify}/destroy', [NetworkController::class, 'networkDestroy']);
$app->router->get('/network/{networkIdentify}/modify', [NetworkController::class, 'networkModify']);
$app->router->post('/network/{networkIdentify}/modify', [NetworkController::class, 'networkEdit']);
$app->router->get('/network/{networkIdentify}', [NetworkController::class, 'networkDisplay']);

// metaseo of routes
$app->router->get('/metaseo', [MetaseoController::class, 'metaseoIndex']);
$app->router->get('/metaseo/build', [MetaseoController::class, 'metaseoBuild']);
$app->router->post('/metaseo/build', [MetaseoController::class, 'metaseoRecord']);
$app->router->get('/metaseo/{metaseoIdentify}/destroy', [MetaseoController::class, 'metaseoDestroy']);
$app->router->get('/metaseo/{metaseoIdentify}/modify', [MetaseoController::class, 'metaseoModify']);
$app->router->post('/metaseo/{metaseoIdentify}/modify', [MetaseoController::class, 'metaseoEdit']);
$app->router->get('/metaseo/{metaseoIdentify}', [MetaseoController::class, 'metaseoDisplay']);

// subcategories of routes
$app->router->get('/subcategories', [SubcategoriesController::class, 'subcategoriesIndex']);
$app->router->get('/subcategories/build', [SubcategoriesController::class, 'subcategoriesBuild']);
$app->router->post('/subcategories/build', [SubcategoriesController::class, 'subcategoriesRecord']);
$app->router->get('/subcategories/{subcategoriesIdentify}/destroy', [SubcategoriesController::class, 'subcategoriesDestroy']);
$app->router->get('/subcategories/{subcategoriesIdentify}/modify', [SubcategoriesController::class, 'subcategoriesModify']);
$app->router->post('/subcategories/{subcategoriesIdentify}/modify', [SubcategoriesController::class, 'subcategoriesEdit']);
$app->router->get('/subcategories/{subcategoriesIdentify}', [SubcategoriesController::class, 'subcategoriesDisplay']);

// categories of routes
$app->router->get('/categories', [CategoriesController::class, 'categoriesIndex']);
$app->router->get('/categories/build', [CategoriesController::class, 'categoriesBuild']);
$app->router->post('/categories/build', [CategoriesController::class, 'categoriesRecord']);
$app->router->get('/categories/{categoriesIdentify}/destroy', [CategoriesController::class, 'categoriesDestroy']);
$app->router->get('/categories/{categoriesIdentify}/modify', [CategoriesController::class, 'categoriesModify']);
$app->router->post('/categories/{categoriesIdentify}/modify', [CategoriesController::class, 'categoriesEdit']);
$app->router->get('/categories/{categoriesIdentify}', [CategoriesController::class, 'categoriesDisplay']);

// categories of routes
$app->router->get('/categories', [CategoriesController::class, 'categoriesIndex']);
$app->router->get('/categories/build', [CategoriesController::class, 'categoriesBuild']);
$app->router->post('/categories/build', [CategoriesController::class, 'categoriesRecord']);
$app->router->get('/categories/{categoriesIdentify}/destroy', [CategoriesController::class, 'categoriesDestroy']);
$app->router->get('/categories/{categoriesIdentify}/modify', [CategoriesController::class, 'categoriesModify']);
$app->router->post('/categories/{categoriesIdentify}/modify', [CategoriesController::class, 'categoriesEdit']);
$app->router->get('/categories/{categoriesIdentify}', [CategoriesController::class, 'categoriesDisplay']);

// subcategories of routes
$app->router->get('/subcategories', [SubcategoriesController::class, 'subcategoriesIndex']);
$app->router->get('/subcategories/build', [SubcategoriesController::class, 'subcategoriesBuild']);
$app->router->post('/subcategories/build', [SubcategoriesController::class, 'subcategoriesRecord']);
$app->router->get('/subcategories/{subcategoriesIdentify}/destroy', [SubcategoriesController::class, 'subcategoriesDestroy']);
$app->router->get('/subcategories/{subcategoriesIdentify}/modify', [SubcategoriesController::class, 'subcategoriesModify']);
$app->router->post('/subcategories/{subcategoriesIdentify}/modify', [SubcategoriesController::class, 'subcategoriesEdit']);
$app->router->get('/subcategories/{subcategoriesIdentify}', [SubcategoriesController::class, 'subcategoriesDisplay']);
