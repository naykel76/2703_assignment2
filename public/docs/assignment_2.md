# 2703ICT Assignment 2

All task where completed for this assignment as per the specifications.

## Design Notes and Approaches

-   The term 'Supplier' will be used in place of 'Restaurant'. This is a more generic and easier to refer to.
-   The term 'User' refers a registered consumer.
-   Implemented 'Policies'
-   Implemented 'Rule' to check if item name unique
-   Used chart.js to display figures in graph

## Details

1.  -   [x] Users can register with this website. When registering, users must provide their _name, email, password, and address_. Furthermore, users must register as either a:
    -   [x] Register as Restaurant, or Consumer.
    -   [x] _Address form both or just consumer?_ Not specified so will add to both. (could be shop address)

2.  -   [x] Registered users can login.
    -   [x] Users should be able to login (or get to the login page) from any page.
    -   [x] A logged in user should be able to log out.
    -   [x] _on login redirect user to restaurants_
    -   [x] _on login redirect supplier to supplier dashboard_
    -   [x] _on login redirect admin to admin dashboard_

3.  -   [x] Only the restaurant users can add dishes to the list of dishes sold by his/her restaurant.
    -   [x] They can also update and delete existing dishes.
    -   [x] A dish must have a name and a price.
    -   [x] A dish name must be unique.
    -   [x] A price must be a positive value.

4.  -   [x] All users (including guests) can see a list of registered restaurants.
    -   [x] They can click into any restaurant to see the dishes this restaurant sells.
    -   [x] _Display message if no items available_ This could be debated because if there is no dish available then why would they be listed. There is no specific requirement to handle so I will leave the message however in production there would be an extra check. `is_approved && has_items`

5.  -   [x] The list of dishes should be paginated with at most 5 dishes per page.
    -   [x] _paginated 4 for cosmetic reasons_

6.  -   [x] (Single purchase) Only consumers can purchase a dish. Since we do not deal with payment gateways in this course, when user clicks on purchase, we simply assume the payment is successful, and save the purchase order in the database.
    -   [x] Then it will display the dish purchased, the price, and the delivery address (which is the consumer’s address) to let the user know that the purchase is successful.
    -   [x] _only consumers can order_ creates the choice do I hide the add to cart buttons unless the user logs in and is confirmed as a consumer. For consumer experience I decided to leave the buttons so they can order without being logged in and force login at checkout. If when logged in the user is not a consumer the option to checkout will not be available.

7.  -   [x] A restaurant (user) can see a list of orders customers have placed on his/her restaurant.
    -   [x] An order should consist of the name of the consumer, that dish (name) that was ordered, and the date that the order was placed.

### Advanced requirements.

8.  -   [x] After user registration, login, or logout, appropriate redirections should be provided. E.g. if user logs in from the details page, then after user logs in, s/he should be redirected back to that page.
    -   _this is handled by the intended method and is a built in part or Laravel_
    -   [x] tested with `/products/create`

9.  -   [x] When restaurant users add a new dish, the dish name must be unique for that restaurant, not across restaurants. This is an extension of requirement 4.
    -   [x] _used custom rule_

10. -   [x] When restaurant users add a dish, s/he can upload a photo for that dish. This photo will be displayed when this dish displayed.

11. -   [x] In addition to requirement 6 (single purchase), consumers can add multiple dishes to a cart,
    -   [x] see the contents in the cart, the cost of this cart (the sum of all dishes),
    -   [x] remove any unwanted dishes, before purchasing these dishes.
    -   [x] Once purchased, the cart will be emptied.
    -   [x] _must order from the same restaurant_ check supplier id is the same when adding to cart or reject with message.

12. -   [x] There is a page which lists the top 5 most popular (most ordered) dishes in the last 30 days.
    -   [x] _set by most ordered qty_
    -   [x] _Used Carbon_

13. -   [x] Restaurants can view a statistic page which shows the sales statics for that restaurant. This page shows:
    -   [x] The total amount of sales (in dollar value) made by this restaurant.
    -   [x] The weekly sales total (in dollar value) for the last 12 weeks, i.e. there should be a sales total for each of the last 12 weeks.
    -   [ ] _Used chart.js to display figures in graph_

14. -   [x] There is another user type called administrator.
    -   [x] There is only 1 administrator which is created through seeder.
    -   [x] The purpose of administrator is to approve new restaurant (users). After a new restaurant user (account) is registered, s/he cannot add/remove dishes from his/her restaurant until this account is approved by the administrator.
    -   [x] There is a page where the administrator can go to see a list of new restaurant accounts that require approval, and to approve these accounts.
