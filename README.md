# seat-buyback
[![Latest Stable Version](http://img.shields.io/packagist/v/h4zz4rddev/seat-buyback.svg?style=flat-square)]()
![](https://img.shields.io/badge/SeAT-4.0.x-blueviolet?style=flat-square)
![](https://img.shields.io/github/license/H4zz4rdDev/seat-buyback?style=flat-square)

A module for [SeAT](https://github.com/eveseat/seat) that makes your life with corporation buyback programs a lot easier.

In case of problems please contact me via EVE-Online message or over the seat discord: `H4zz4rd`

## Screenshots
![adminpanel](https://i.imgur.com/1c3sdA6.png)

![requestpanel](https://i.imgur.com/CC7NtH3.png)

![contracts](https://i.imgur.com/faV829v.png)

## Permissions
There are three different types of permissions you can give to your members:

#### Request
This is the default right a corp mate needs to access the buyback module. This permission includes the "Request" and "My Contracts" section.
#### Contract
This permission is for all corp mates that are allowed to manage the corp buyback requests / contracts. 
#### Admin
This permission gives access to the admin section. Here you can adjust some general plugin settings and configure the buyback item settings.

## Usage

User:
1. Copy & Paste your items you want to sell into the form under request.
2. If everything is fine create the contract in EVE with the details shown on the right
3. Click on Confirm. Done. You will be redirected to the "My Buyback" showing you created buyback.
4. Contract-Manager: Under "Contracts" you can see all created contracts and are able to delete or finish them after you have compared them with the ingame contract of the corp mate.The random generated ID will help you to find contracts faster.

> :warning: The buyback will only be saved with the click on "Confirm". Created contracts in EVE can not be seen by the plugin.

> :warning: Each item price is cached and only refreshed by default every hour. You can change the cache time over the admin section. Please **do not** set this value too low because this would spam the chosen price provider api and your server could get banned for a while.

## Discord Notifications
You are able to receive on every new buyback request discord notification over a discord webhook url directly into a discord channel. By default, the discord notification are turned off. You have to provide a valid discord webhook url over the admin settings page first.

How can I get my channel webhook url?
[Webhook Url Guide](https://support.discord.com/hc/en-us/articles/228383668-Intro-to-Webhooks)

Example:

![discordexample](https://i.imgur.com/Y3BExAi.png)

## Quick Installation Guide:
Instructions on how to install this plugin can be found in the [official seat documentation](https://eveseat.github.io/docs/community_packages/).



