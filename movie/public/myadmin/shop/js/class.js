define("class@1.0.0/attrs",["lang@~1.0.0"],function(require,exports,module){function setValue(host,attr,value,override,ghost){var setter,validator,v,pass=!0;return ghost||(attr[READ_ONLY]?pass=!1:(validator=getMethod(host,attr,VALIDATOR),pass=!validator||validator.call(host,value)),pass&&attr[WRITE_ONCE]&&(delete attr[WRITE_ONCE],attr[READ_ONLY]=TRUE)),pass&&(setter=getMethod(host,attr,SETTER),setter?attr.value=setter.call(host,value):!override&&isPlainObject(value)&&isPlainObject(v=attr.value)?lang.mix(v,value):attr.value=value),pass}function getValue(host,attr){var getter=getMethod(host,attr,GETTER),v=attr.value;return getter?getter.call(host,v):v}function getMethod(host,attr,name){var method=attr[name];return"string"==typeof method?host[method]:method}function createGetterSetter(host,sandbox,undef){host.set=lang.overloadSetter(function(key,value,override){var attr=sandbox[key];return attr?setValue(this,attr,value,override):!1}),host.get=function(key){var attr=sandbox[key];return attr?getValue(this,attr):undef},host.addAttr=function(key,setting){sandbox[key]||(sandbox[key]=lang.isObject(setting)?lang.clone(setting):{})}}function createPublicMethod(name){return function(){var self=this,sandbox=createSandBox(self);return createGetterSetter(self,sandbox),self[name].apply(self,arguments)}}function createSandBox(host){var sandbox,class_=host.constructor;do if(sandbox=class_.ATTRS)break;while(class_=class_.prototype[__SUPER_CLASS]);return sandbox?lang.clone(sandbox):{}}var lang=require("lang"),TRUE=!0,GETTER="getter",SETTER="setter",VALIDATOR="validator",READ_ONLY="readOnly",WRITE_ONCE="writeOnce",__SUPER_CLASS="superclass",isPlainObject=lang.isPlainObject,attrs={};["addAttr","get","set"].forEach(function(name){attrs[name]=createPublicMethod(name)}),module.exports=attrs,attrs=null}),define("class@1.0.0/events",["lang@~1.0.0"],function(require,exports,module){function getStorage(host,type){var storage,ATTR_EVENTS="__ev";return storage=host[ATTR_EVENTS]||(host[ATTR_EVENTS]={}),storage[type]||(storage[type]=[])}function addOrRemoveEvent(host,type,fn,toAdd){var storage=getStorage(host,type),i=0,len=storage.lenth;if(toAdd)lang.isFunction(fn)&&storage.push(fn);else if(lang.isFunction(fn))for(;len>i;i++)storage[i]===fn&&storage.splice(i,1);else fn||(storage.length=0);return host}var lang=require("lang");module.exports={on:lang.overloadSetter(function(type,fn){return addOrRemoveEvent(this,type,fn,!0)}),off:function(type,fn){return addOrRemoveEvent(this,type,fn)},fire:function(type,args){var self=this;return args=lang.makeArray(args),getStorage(self,type).forEach(function(fn){fn.apply(self,args)}),self}}}),define("class@1.0.0",["lang@~1.0.0","./attrs","./events"],function(require,exports,module){"use strict";function getPrototype(obj){var ret;return obj&&(ret=lang.isPlainObject(obj)?obj:"string"==typeof obj?getPrototype(EXTS[obj.toLowerCase()]):obj.prototype),ret}function implementOne(host,alien,override){var proto=getPrototype(alien);proto&&lang.mix(host,lang.clone(proto),override)}function implement(proto,extensions,override){"string"==typeof extensions&&(extensions=extensions.trim().split(/\s+/)),lang.makeArray(extensions).forEach(function(alien){implementOne(this,alien,override)},proto)}function setAttrs(class_,attrs){var parent=class_.prototype.superClass;class_.ATTRS=lang.mix(attrs||{},lang.clone(parent&&parent.ATTRS),!1)}function resetPrototypeChain(instance){var value,key,reset;for(key in instance){if(value=instance[key],lang.isPlainObject(value)){var F=function(){};F.prototype=value,reset=resetPrototypeChain(new F)}else reset=lang.clone(value);instance[key]=reset}return instance}function Class(properties,attrs){if(this instanceof Class)throw new Error("Class should not be used with `new`");if(lang.isObject(properties)){var EXTENDS="Extends",base=properties[EXTENDS];return delete properties[EXTENDS],_Class(base,properties,attrs)}var base=lang.isFunction(properties)?properties:function(){};return setAttrs(base,attrs),base}function _Class(base,proto,attrs){function newClass(){var self=this,init=initialize;return resetPrototypeChain(self),init?init.apply(self,arguments):void 0}var newProto,IMPLEMENTS="Implements",initialize=proto[INITIALIZE]||base,exts=proto[IMPLEMENTS];if(delete proto[INITIALIZE],delete proto[IMPLEMENTS],base){var F=function(){};F.prototype=base.prototype,newProto=new F,exts&&implement(newProto,exts,!0),newProto.superClass=base,lang.mix(newProto,proto)}else newProto=proto,exts&&implement(newProto,exts,!1);return newClass.prototype=newProto,newProto.constructor=newClass,setAttrs(newClass,attrs),newClass}var lang=require("lang"),INITIALIZE="initialize",EXTS={};Class.EXTS=EXTS,Class.setAttrs=setAttrs,module.exports=Class,Class.EXTS.attrs=require("./attrs"),Class.EXTS.events=require("./events")}),define("class@1.0.0/attrs",["lang@~1.0.0"],function(require,exports,module){function setValue(host,attr,value,override,ghost){var setter,validator,v,pass=!0;return ghost||(attr[READ_ONLY]?pass=!1:(validator=getMethod(host,attr,VALIDATOR),pass=!validator||validator.call(host,value)),pass&&attr[WRITE_ONCE]&&(delete attr[WRITE_ONCE],attr[READ_ONLY]=TRUE)),pass&&(setter=getMethod(host,attr,SETTER),setter?attr.value=setter.call(host,value):!override&&isPlainObject(value)&&isPlainObject(v=attr.value)?lang.mix(v,value):attr.value=value),pass}function getValue(host,attr){var getter=getMethod(host,attr,GETTER),v=attr.value;return getter?getter.call(host,v):v}function getMethod(host,attr,name){var method=attr[name];return"string"==typeof method?host[method]:method}function createGetterSetter(host,sandbox,undef){host.set=lang.overloadSetter(function(key,value,override){var attr=sandbox[key];return attr?setValue(this,attr,value,override):!1}),host.get=function(key){var attr=sandbox[key];return attr?getValue(this,attr):undef},host.addAttr=function(key,setting){sandbox[key]||(sandbox[key]=lang.isObject(setting)?lang.clone(setting):{})}}function createPublicMethod(name){return function(){var self=this,sandbox=createSandBox(self);return createGetterSetter(self,sandbox),self[name].apply(self,arguments)}}function createSandBox(host){var sandbox,class_=host.constructor;do if(sandbox=class_.ATTRS)break;while(class_=class_.prototype[__SUPER_CLASS]);return sandbox?lang.clone(sandbox):{}}var lang=require("lang"),TRUE=!0,GETTER="getter",SETTER="setter",VALIDATOR="validator",READ_ONLY="readOnly",WRITE_ONCE="writeOnce",__SUPER_CLASS="superclass",isPlainObject=lang.isPlainObject,attrs={};["addAttr","get","set"].forEach(function(name){attrs[name]=createPublicMethod(name)}),module.exports=attrs,attrs=null}),define("class@1.0.0/events",["lang@~1.0.0"],function(require,exports,module){function getStorage(host,type){var storage,ATTR_EVENTS="__ev";return storage=host[ATTR_EVENTS]||(host[ATTR_EVENTS]={}),storage[type]||(storage[type]=[])}function addOrRemoveEvent(host,type,fn,toAdd){var storage=getStorage(host,type),i=0,len=storage.lenth;if(toAdd)lang.isFunction(fn)&&storage.push(fn);else if(lang.isFunction(fn))for(;len>i;i++)storage[i]===fn&&storage.splice(i,1);else fn||(storage.length=0);return host}var lang=require("lang");module.exports={on:lang.overloadSetter(function(type,fn){return addOrRemoveEvent(this,type,fn,!0)}),off:function(type,fn){return addOrRemoveEvent(this,type,fn)},fire:function(type,args){var self=this;return args=lang.makeArray(args),getStorage(self,type).forEach(function(fn){fn.apply(self,args)}),self}}}),define("class@1.0.0",["lang@~1.0.0","./attrs","./events"],function(require,exports,module){"use strict";function getPrototype(obj){var ret;return obj&&(ret=lang.isPlainObject(obj)?obj:"string"==typeof obj?getPrototype(EXTS[obj.toLowerCase()]):obj.prototype),ret}function implementOne(host,alien,override){var proto=getPrototype(alien);proto&&lang.mix(host,lang.clone(proto),override)}function implement(proto,extensions,override){"string"==typeof extensions&&(extensions=extensions.trim().split(/\s+/)),lang.makeArray(extensions).forEach(function(alien){implementOne(this,alien,override)},proto)}function setAttrs(class_,attrs){var parent=class_.prototype.superClass;class_.ATTRS=lang.mix(attrs||{},lang.clone(parent&&parent.ATTRS),!1)}function resetPrototypeChain(instance){var value,key,reset;for(key in instance){if(value=instance[key],lang.isPlainObject(value)){var F=function(){};F.prototype=value,reset=resetPrototypeChain(new F)}else reset=lang.clone(value);instance[key]=reset}return instance}function Class(properties,attrs){if(this instanceof Class)throw new Error("Class should not be used with `new`");if(lang.isObject(properties)){var EXTENDS="Extends",base=properties[EXTENDS];return delete properties[EXTENDS],_Class(base,properties,attrs)}var base=lang.isFunction(properties)?properties:function(){};return setAttrs(base,attrs),base}function _Class(base,proto,attrs){function newClass(){var self=this,init=initialize;return resetPrototypeChain(self),init?init.apply(self,arguments):void 0}var newProto,IMPLEMENTS="Implements",initialize=proto[INITIALIZE]||base,exts=proto[IMPLEMENTS];if(delete proto[INITIALIZE],delete proto[IMPLEMENTS],base){var F=function(){};F.prototype=base.prototype,newProto=new F,exts&&implement(newProto,exts,!0),newProto.superClass=base,lang.mix(newProto,proto)}else newProto=proto,exts&&implement(newProto,exts,!1);return newClass.prototype=newProto,newProto.constructor=newClass,setAttrs(newClass,attrs),newClass}var lang=require("lang"),INITIALIZE="initialize",EXTS={};Class.EXTS=EXTS,Class.setAttrs=setAttrs,module.exports=Class,Class.EXTS.attrs=require("./attrs"),Class.EXTS.events=require("./events")}),define("class@1.0.0/attrs",["lang@~1.0.0"],function(require,exports,module){function setValue(host,attr,value,override,ghost){var setter,validator,v,pass=!0;return ghost||(attr[READ_ONLY]?pass=!1:(validator=getMethod(host,attr,VALIDATOR),pass=!validator||validator.call(host,value)),pass&&attr[WRITE_ONCE]&&(delete attr[WRITE_ONCE],attr[READ_ONLY]=TRUE)),pass&&(setter=getMethod(host,attr,SETTER),setter?attr.value=setter.call(host,value):!override&&isPlainObject(value)&&isPlainObject(v=attr.value)?lang.mix(v,value):attr.value=value),pass}function getValue(host,attr){var getter=getMethod(host,attr,GETTER),v=attr.value;return getter?getter.call(host,v):v}function getMethod(host,attr,name){var method=attr[name];return"string"==typeof method?host[method]:method}function createGetterSetter(host,sandbox,undef){host.set=lang.overloadSetter(function(key,value,override){var attr=sandbox[key];return attr?setValue(this,attr,value,override):!1}),host.get=function(key){var attr=sandbox[key];return attr?getValue(this,attr):undef},host.addAttr=function(key,setting){sandbox[key]||(sandbox[key]=lang.isObject(setting)?lang.clone(setting):{})}}function createPublicMethod(name){return function(){var self=this,sandbox=createSandBox(self);return createGetterSetter(self,sandbox),self[name].apply(self,arguments)}}function createSandBox(host){var sandbox,class_=host.constructor;do if(sandbox=class_.ATTRS)break;while(class_=class_.prototype[__SUPER_CLASS]);return sandbox?lang.clone(sandbox):{}}var lang=require("lang"),TRUE=!0,GETTER="getter",SETTER="setter",VALIDATOR="validator",READ_ONLY="readOnly",WRITE_ONCE="writeOnce",__SUPER_CLASS="superclass",isPlainObject=lang.isPlainObject,attrs={};["addAttr","get","set"].forEach(function(name){attrs[name]=createPublicMethod(name)}),module.exports=attrs,attrs=null}),define("class@1.0.0/events",["lang@~1.0.0"],function(require,exports,module){function getStorage(host,type){var storage,ATTR_EVENTS="__ev";return storage=host[ATTR_EVENTS]||(host[ATTR_EVENTS]={}),storage[type]||(storage[type]=[])}function addOrRemoveEvent(host,type,fn,toAdd){var storage=getStorage(host,type),i=0,len=storage.lenth;if(toAdd)lang.isFunction(fn)&&storage.push(fn);else if(lang.isFunction(fn))for(;len>i;i++)storage[i]===fn&&storage.splice(i,1);else fn||(storage.length=0);return host}var lang=require("lang");module.exports={on:lang.overloadSetter(function(type,fn){return addOrRemoveEvent(this,type,fn,!0)}),off:function(type,fn){return addOrRemoveEvent(this,type,fn)},fire:function(type,args){var self=this;return args=lang.makeArray(args),getStorage(self,type).forEach(function(fn){fn.apply(self,args)}),self}}}),define("class@1.0.0",["lang@~1.0.0","./attrs","./events"],function(require,exports,module){"use strict";function getPrototype(obj){var ret;return obj&&(ret=lang.isPlainObject(obj)?obj:"string"==typeof obj?getPrototype(EXTS[obj.toLowerCase()]):obj.prototype),ret}function implementOne(host,alien,override){var proto=getPrototype(alien);proto&&lang.mix(host,lang.clone(proto),override)}function implement(proto,extensions,override){"string"==typeof extensions&&(extensions=extensions.trim().split(/\s+/)),lang.makeArray(extensions).forEach(function(alien){implementOne(this,alien,override)},proto)}function setAttrs(class_,attrs){var parent=class_.prototype.superClass;class_.ATTRS=lang.mix(attrs||{},lang.clone(parent&&parent.ATTRS),!1)}function resetPrototypeChain(instance){var value,key,reset;for(key in instance){if(value=instance[key],lang.isPlainObject(value)){var F=function(){};F.prototype=value,reset=resetPrototypeChain(new F)}else reset=lang.clone(value);instance[key]=reset}return instance}function Class(properties,attrs){if(this instanceof Class)throw new Error("Class should not be used with `new`");if(lang.isObject(properties)){var EXTENDS="Extends",base=properties[EXTENDS];return delete properties[EXTENDS],_Class(base,properties,attrs)}var base=lang.isFunction(properties)?properties:function(){};return setAttrs(base,attrs),base}function _Class(base,proto,attrs){function newClass(){var self=this,init=initialize;return resetPrototypeChain(self),init?init.apply(self,arguments):void 0}var newProto,IMPLEMENTS="Implements",initialize=proto[INITIALIZE]||base,exts=proto[IMPLEMENTS];if(delete proto[INITIALIZE],delete proto[IMPLEMENTS],base){var F=function(){};F.prototype=base.prototype,newProto=new F,exts&&implement(newProto,exts,!0),newProto.superClass=base,lang.mix(newProto,proto)}else newProto=proto,exts&&implement(newProto,exts,!1);return newClass.prototype=newProto,newProto.constructor=newClass,setAttrs(newClass,attrs),newClass}var lang=require("lang"),INITIALIZE="initialize",EXTS={};Class.EXTS=EXTS,Class.setAttrs=setAttrs,module.exports=Class,Class.EXTS.attrs=require("./attrs"),Class.EXTS.events=require("./events")}),define("class@1.0.0/attrs",["lang@~1.0.0"],function(require,exports,module){function setValue(host,attr,value,override,ghost){var setter,validator,v,pass=!0;return ghost||(attr[READ_ONLY]?pass=!1:(validator=getMethod(host,attr,VALIDATOR),pass=!validator||validator.call(host,value)),pass&&attr[WRITE_ONCE]&&(delete attr[WRITE_ONCE],attr[READ_ONLY]=TRUE)),pass&&(setter=getMethod(host,attr,SETTER),setter?attr.value=setter.call(host,value):!override&&isPlainObject(value)&&isPlainObject(v=attr.value)?lang.mix(v,value):attr.value=value),pass}function getValue(host,attr){var getter=getMethod(host,attr,GETTER),v=attr.value;return getter?getter.call(host,v):v}function getMethod(host,attr,name){var method=attr[name];return"string"==typeof method?host[method]:method}function createGetterSetter(host,sandbox,undef){host.set=lang.overloadSetter(function(key,value,override){var attr=sandbox[key];return attr?setValue(this,attr,value,override):!1}),host.get=function(key){var attr=sandbox[key];return attr?getValue(this,attr):undef},host.addAttr=function(key,setting){sandbox[key]||(sandbox[key]=lang.isObject(setting)?lang.clone(setting):{})}}function createPublicMethod(name){return function(){var self=this,sandbox=createSandBox(self);return createGetterSetter(self,sandbox),self[name].apply(self,arguments)}}function createSandBox(host){var sandbox,class_=host.constructor;do if(sandbox=class_.ATTRS)break;while(class_=class_.prototype[__SUPER_CLASS]);return sandbox?lang.clone(sandbox):{}}var lang=require("lang"),TRUE=!0,GETTER="getter",SETTER="setter",VALIDATOR="validator",READ_ONLY="readOnly",WRITE_ONCE="writeOnce",__SUPER_CLASS="superclass",isPlainObject=lang.isPlainObject,attrs={};["addAttr","get","set"].forEach(function(name){attrs[name]=createPublicMethod(name)}),module.exports=attrs,attrs=null}),define("class@1.0.0/events",["lang@~1.0.0"],function(require,exports,module){function getStorage(host,type){var storage,ATTR_EVENTS="__ev";return storage=host[ATTR_EVENTS]||(host[ATTR_EVENTS]={}),storage[type]||(storage[type]=[])}function addOrRemoveEvent(host,type,fn,toAdd){var storage=getStorage(host,type),i=0,len=storage.lenth;if(toAdd)lang.isFunction(fn)&&storage.push(fn);else if(lang.isFunction(fn))for(;len>i;i++)storage[i]===fn&&storage.splice(i,1);else fn||(storage.length=0);return host}var lang=require("lang");module.exports={on:lang.overloadSetter(function(type,fn){return addOrRemoveEvent(this,type,fn,!0)}),off:function(type,fn){return addOrRemoveEvent(this,type,fn)},fire:function(type,args){var self=this;return args=lang.makeArray(args),getStorage(self,type).forEach(function(fn){fn.apply(self,args)}),self}}}),define("class@1.0.0",["lang@~1.0.0","./attrs","./events"],function(require,exports,module){"use strict";function getPrototype(obj){var ret;return obj&&(ret=lang.isPlainObject(obj)?obj:"string"==typeof obj?getPrototype(EXTS[obj.toLowerCase()]):obj.prototype),ret}function implementOne(host,alien,override){var proto=getPrototype(alien);proto&&lang.mix(host,lang.clone(proto),override)}function implement(proto,extensions,override){"string"==typeof extensions&&(extensions=extensions.trim().split(/\s+/)),lang.makeArray(extensions).forEach(function(alien){implementOne(this,alien,override)},proto)}function setAttrs(class_,attrs){var parent=class_.prototype.superClass;class_.ATTRS=lang.mix(attrs||{},lang.clone(parent&&parent.ATTRS),!1)}function resetPrototypeChain(instance){var value,key,reset;for(key in instance){if(value=instance[key],lang.isPlainObject(value)){var F=function(){};F.prototype=value,reset=resetPrototypeChain(new F)}else reset=lang.clone(value);instance[key]=reset}return instance}function Class(properties,attrs){if(this instanceof Class)throw new Error("Class should not be used with `new`");if(lang.isObject(properties)){var EXTENDS="Extends",base=properties[EXTENDS];return delete properties[EXTENDS],_Class(base,properties,attrs)}var base=lang.isFunction(properties)?properties:function(){};return setAttrs(base,attrs),base}function _Class(base,proto,attrs){function newClass(){var self=this,init=initialize;return resetPrototypeChain(self),init?init.apply(self,arguments):void 0}var newProto,IMPLEMENTS="Implements",initialize=proto[INITIALIZE]||base,exts=proto[IMPLEMENTS];if(delete proto[INITIALIZE],delete proto[IMPLEMENTS],base){var F=function(){};F.prototype=base.prototype,newProto=new F,exts&&implement(newProto,exts,!0),newProto.superClass=base,lang.mix(newProto,proto)}else newProto=proto,exts&&implement(newProto,exts,!1);return newClass.prototype=newProto,newProto.constructor=newClass,setAttrs(newClass,attrs),newClass}var lang=require("lang"),INITIALIZE="initialize",EXTS={};Class.EXTS=EXTS,Class.setAttrs=setAttrs,module.exports=Class,Class.EXTS.attrs=require("./attrs"),Class.EXTS.events=require("./events")});