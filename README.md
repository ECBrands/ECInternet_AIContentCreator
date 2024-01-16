# ECInternet_AIContentCreator module
The ECInternet_AIContentCreator module enables you to ...

## Goal
Give ChatGPT as much information as possible about product, and simple prompt with an optional user-set prompt for fine-tuning.

## Message Roles
- `system` - Sets up the context and behavior of the assistant
- `user` - Gives instructions to the user. This value is typically generated by the end user, but developers can also provide potential prompts beforehand
- `assistant` - Pass additional information to the assistant so that it can provide a more accurate response

## Temperature
The temperature parameter controls the randomness of the response.
A higher temperature will generate more random responses.
A lower temperature will generate more predictable responses.
The temperature value must be between 0 and 2, and the default value is 0.5 <font color="red">(check)</font>.

## DB Tables
- `ecinternet_aicontentcreator_prompt` - Stores prompts for the AI to use
- `ecinternet_aicontentcreator_pending_request` - Stores pending requests for the AI to process
- `ecinternet_aicontentcreator_staging_request` - Stores staging requests for admin to approve / deny
- `ecinternet_aicontentcreator_completed_request` - Stores completed requests
- `ecinternet_aicontentcreator_log` - Stores logs of requests and responses

## Models
### Request
- EntityId
- CreatedAt
- UpdatedAt
- ProductId
- AttributeId
- 

## Prompts
```text
Write a description for a product in HTML format with the following information:
Name: ___________
Manufacturer: ___________
Features: ___________

Emulate the writing and html style of the following similar product in your description:
<h2>AirLink XR90</h2>
<p>This products yada yada yadas</p>
<p>Additionally, this product is amazing</p>
<p>Features</p>
<ul>
    <li>Feature 1</li>
    <li>Feature 2</li>
    <li>Feature 3</li>
</ul>
``