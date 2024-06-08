# Discord PoC


## Guilds

table: guilds

id: uuid
name: string
icon: string <default = tanto faz>
owner_id: uuid references id in users
members_count: int
messages_count: int
is_nsfw: bool


## Members


id: uuid
guild_id: uuid referenecs
user_id:  uuid references
messages_count: 
