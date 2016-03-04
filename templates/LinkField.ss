<input $AttributesHTML style='display: none'/>
<%-- Chris Bolt, added Read only logic --%>
<% if $isReadonly %>
	<% if $Value %>
    	$LinkObject
    <% else %>
    	(none)
    <% end_if %>
<% else %>

<% if $Value %>
	$BetterLinkObject &nbsp;
	<button href='#' class='linkfield-button ss-ui-button ss-ui-button-small'><%t Linkable.EDIT 'Edit' %></button>
	<button href='#' class='linkfield-remove-button ss-ui-button ss-ui-button-small ss-ui-action-destructive'><%t Linkable.REMOVE 'Remove' %></button>
<% else %>
	<button href='#' class='linkfield-button ss-ui-button ss-ui-button-small'><%t Linkable.ADDLINK 'Add Link' %></button>
<% end_if %>

<div class='linkfield-dialog'></div>

<% end_if %>