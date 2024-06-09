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


## Messages

table: channel_messages

channel_id:
member_id:
message: 
timestamps:

## Next steps (tomorrow)

- create "production" scenario
  - seeders
- integrate channels
  - member join (done)
  - member left (done)
  - message sent (event done)
  - delete message (maybe not)
- implement better visualization
- implement pulse
- add req/dto layers
- write 1 fallback test for each case
