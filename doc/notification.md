# Notification

Here you can send notifications at once to all admin users listed in `config/ladmin.php`.

```php
return [

    . . .

    'user' => \App\Models\User::class,

    . . .
];
```

![Notification PopUp](https://github.com/hexters/assets/blob/main/ladmin/v2/captures/notification-popup.png?raw=true)

And here you can send notifications to only one user. see example below.

## Broadcast Message

Sending broadcasting messages to all registered admins

```php
    ladmin()
    ->notification()
        ->setTitle('New Invoice')
        ->setLink('http://project.test/invoice/31eb6d58-3622-42a4-9206-d36e7a8d6c06')
        ->setDescription('Pay invoice #123455')
        ->setImageLink('http://porject.test/icon-invoice.ong')
        ->setGates(['ladmin.blog.reviewer', 'ladmin.blog.writer'])
    ->send()
```

## Send to Spesific User
Sending messages to only one user, remember that this message can only be sent to users who are initialized to the `Illuminate\Foundation\Auth\User` class.

```php
    ladmin()
    ->notification( User::first() )
        ->setTitle('New Invoice')
        ->setLink('http://project.test/invoice/31eb6d58-3622-42a4-9206-d36e7a8d6c06')
        ->setDescription('Pay invoice #123455')
        ->setImageLink('http://porject.test/icon-invoice.ong')
        ->setGates(['ladmin.blog.reviewer', 'ladmin.blog.writer'])
    ->send()
```

## Notification Requirement
|Option|Type|required|Note|
|-|-|:-:|-|
|`notification`|? \Illuminate\Foundation\Auth\User|YES|Value is not required|
|`setTitle`|String|YES|-|
|`setLink`|String|YES|-|
|`setImageLink`|String|NO|-|
|`setDescription`|String|YES|-|
|`setGates`|Array|NO| Default all gates |

## Notification Page
`http://localhost:8000/administrator/notification`

![Notification Page](https://raw.githubusercontent.com/hexters/assets/main/ladmin/v2/captures/notification-page.png)

# Listening Notifications

Notifications will broadcast on a private channel formatted using a {notifiable}.{id} convention. View complete [Documentation](https://laravel.com/docs/9.x/notifications#listening-for-notifications)

```javascript
Echo.private('ladmin.notification.' + userId)
.notification((notification) => {
    console.log(notification.type);
});
```