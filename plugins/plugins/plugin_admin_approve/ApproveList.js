// JavaScript Document

function SendNotify(id1, id2){

	Effect.toggle('EmailThis','appear');
	Timer_Icon('ApproveListDisplay');

	eMeetingDo("../plugins/plugins/plugin_admin_approve/Ajax.php?action=delete&id="+id2+"&nid="+id1,"ApproveListDisplay");
}

function DeclineMember(div, id){

	new Effect.Fade(div);
	Effect.toggle('EmailThis','appear');
	document.getElementById('MID').value=''+id+'';

}

function AcceptMember(div, id){

	new Effect.Fade(div);
	Timer_Icon('ApproveListDisplay');

	eMeetingDo("../plugins/plugins/plugin_admin_approve/Ajax.php?action=accept&id="+id,"ApproveListDisplay");

}

function updatethis(type, value, id){

	Timer_Icon('ApproveListDisplay');

	eMeetingDo("../plugins/plugins/plugin_admin_approve/Ajax.php?action=updateThis&type="+type+"&val="+value+"&id="+id,"ApproveListDisplay");
}