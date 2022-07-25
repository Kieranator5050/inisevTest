<h1>Website Subscriber Management System</h1>

<p><em>Initializing</em></p>
<ul>
    <li>Run "php artisan serve" to start the dev server</li>
    <li>Run "php artisan queue:work" to start the queue</li>
</ul>

<p><em>Env Configuration</em><p>
<ul>
    <li>Set the queue connection : QUEUE_CONNECTION</li>
    <li>Configure the mail variables</li>
</ul>

<p><em>Send Emails Command</em></p>
<ul>
<li>Run "php artisan email:send"</li>
</ul>

<h3>Endpoints</h3>
<p>Postman Documentation is attached to the repository as inisevLaravelTest.postman_collection.json</p>
<table>
    <thead>
        <th>Endpoint</th>
        <th>Description</th>
    </thead>
<tbody>
    <tr>
        <td>/api/post</td>
        <td>Creates a new post</td>
    </tr>
    <tr>
        <td>/api/subscribe</td>
        <td>Adds a new subscriber</td>
    </tr>
</tbody>
</table>
