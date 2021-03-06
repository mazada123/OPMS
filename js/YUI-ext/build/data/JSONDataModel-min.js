/*
 * YUI Extensions
 * Copyright(c) 2006, Jack Slocum.
 * 
 * This code is licensed under BSD license. 
 * http://www.opensource.org/licenses/bsd-license.php
 */


YAHOO.ext.grid.JSONDataModel=function(schema){YAHOO.ext.grid.JSONDataModel.superclass.constructor.call(this,YAHOO.ext.grid.LoadableDataModel.JSON);this.schema=schema;};YAHOO.extendX(YAHOO.ext.grid.JSONDataModel,YAHOO.ext.grid.LoadableDataModel);YAHOO.ext.grid.JSONDataModel.prototype.loadData=function(data,callback,keepExisting){var idField=this.schema.id;var fields=this.schema.fields;var rowData=[];try{var root=eval('data.'+this.schema.root);for(var i=0;i<root.length;i++){var node=root[i];var colData=[];colData.node=node;colData.id=node[idField]||String(i);for(var j=0;j<fields.length;j++){var val=node[fields[j]]||"";if(this.preprocessors[j]){val=this.preprocessors[j](val);}
colData.push(val);}
rowData.push(colData);}
if(keepExisting!==true){this.removeAll();}
this.addRows(rowData);if(typeof callback=='function'){callback(this,true);}
this.fireLoadEvent();}catch(e){this.fireLoadException(e,null);if(typeof callback=='function'){callback(this,false);}}};YAHOO.ext.grid.JSONDataModel.prototype.getRowId=function(rowIndex){return this.data[rowIndex].id;};