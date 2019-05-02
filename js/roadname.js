var allRoadName = JSON.parse(document.getElementById('allRoadName').innerHTML);
Array.prototype.forEach.call(allRoadName,function(roadData){
    var ul = document.getElementById('pageSubmenu');
    var list = document.createElement('li');
    var ahref = document.createElement('a');
    var roadlabel = document.createTextNode(roadData.label);
    ahref.href = `editroad.php?id_location=${roadData.id_location}`;
    ahref.appendChild(roadlabel);
    list.appendChild(ahref);
    ul.appendChild(list);
})