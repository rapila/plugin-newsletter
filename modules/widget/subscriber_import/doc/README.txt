Subscriber Import

Description:
• Subscriber import - at this point in time - simply imports email addresses - separated, @see SubscriberImportWidgetModule::addSubscribers()
• to a specific target subscriber_group_id
• creating a temporary, virtual subscriber_group (subscriber_group_id+identifier)
@todo, if desired in the future this could be enhanced by handling import of excel with name, email, language?

Processing of email addresses:
• if they already exist, they are ignored
• email is checked, invalid emails are temporarily stored for the import_errors message
• for valid emails a new subscriber is created
• a subscriber_group_membership for the target subscriber_group is added if it does not exist yet
• this "backend" created subscriber_group_memberships is marked with boolean is_backend_created=true

The idea behind this import:
• As soon as there are subscriber_group_membership marked with is_backend_created, a virtual subscriber_group is created and displayed in the newsletter_send dialog
• is_backend_created subscriptions are excluded from newletter mailing to the original subscriber group.
• So newly imported subscribers can be invited, processed in a special way. As soon as they are sent, the boolean is_backend_created is reset to false, so imported memberships become normal ones.
• there is no history of is_backend_created. Once set to false a subscription is like all the others

Modules affected by this widget
MailGroupInput:
• a new setting "include_temporary_mail_groups" (default: true) has been added
	all the tempora

SubscriberList:
• if there are any is_backend_created subscriptions, a additional column and filter "is_backend_created" is displayed automatically in the subscriber list

TODO
this widget should probably be included in the info_bar of the SubscriberListWidgetModule, together with the export option
maybe the "action" button should contain this functionalities.