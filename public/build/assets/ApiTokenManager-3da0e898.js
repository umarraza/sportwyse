import{o as i,c as N,w as e,a as t,r as y,T as x,d as b,e as c,b as o,f as g,g as n,_ as T,h as L,u as a,i as z,F as w,j as $,t as h,n as C}from"./app-ed6aa4ba.js";import{_ as U}from"./ActionMessage-b72b32ff.js";import{_ as W,a as E,b as S}from"./DialogModal-c7820c21.js";import{_ as B}from"./Checkbox-5e23a8e8.js";import{_ as H}from"./DangerButton-c8770f55.js";import{_ as Y}from"./FormSection-46ce95d4.js";import{_ as I}from"./PrimaryButton-c60426c5.js";import{_ as A}from"./SecondaryButton-94de77ce.js";import{S as q}from"./SectionBorder-436fb2fd.js";import"./SectionTitle-89d3844e.js";import"./_plugin-vue_export-helper-c27b6911.js";const G={class:"bg-white px-4 pt-5 pb-4 sm:p-6 sm:pb-4"},J={class:"sm:flex sm:items-start"},K=t("div",{class:"mx-auto shrink-0 flex items-center justify-center h-12 w-12 rounded-full bg-red-100 sm:mx-0 sm:h-10 sm:w-10"},[t("svg",{class:"h-6 w-6 text-red-600",xmlns:"http://www.w3.org/2000/svg",fill:"none",viewBox:"0 0 24 24","stroke-width":"1.5",stroke:"currentColor"},[t("path",{"stroke-linecap":"round","stroke-linejoin":"round",d:"M12 9v3.75m-9.303 3.376c-.866 1.5.217 3.374 1.948 3.374h14.71c1.73 0 2.813-1.874 1.948-3.374L13.949 3.378c-.866-1.5-3.032-1.5-3.898 0L2.697 16.126zM12 15.75h.007v.008H12v-.008z"})])],-1),O={class:"mt-3 text-center sm:mt-0 sm:ml-4 sm:text-left"},Q={class:"text-lg font-medium text-gray-900"},R={class:"mt-4 text-sm text-gray-600"},X={class:"flex flex-row justify-end px-6 py-4 bg-gray-100 text-right"},Z={__name:"ConfirmationModal",props:{show:{type:Boolean,default:!1},maxWidth:{type:String,default:"2xl"},closeable:{type:Boolean,default:!0}},emits:["close"],setup(d,{emit:P}){const r=P,m=()=>{r("close")};return(u,v)=>(i(),N(W,{show:d.show,"max-width":d.maxWidth,closeable:d.closeable,onClose:m},{default:e(()=>[t("div",G,[t("div",J,[K,t("div",O,[t("h3",Q,[y(u.$slots,"title")]),t("div",R,[y(u.$slots,"content")])])])]),t("div",X,[y(u.$slots,"footer")])]),_:3},8,["show","max-width","closeable"]))}},ee={class:"col-span-6 sm:col-span-4"},se={key:0,class:"col-span-6"},te={class:"mt-2 grid grid-cols-1 md:grid-cols-2 gap-4"},oe={class:"flex items-center"},le={class:"ml-2 text-sm text-gray-600"},ne={key:0},ae={class:"mt-10 sm:mt-0"},ie={class:"space-y-6"},re={class:"break-all"},ce={class:"flex items-center ml-2"},de={key:0,class:"text-sm text-gray-400"},me=["onClick"],ue=["onClick"],pe=t("div",null," Please copy your new API token. For your security, it won't be shown again. ",-1),fe={key:0,class:"mt-4 bg-gray-100 px-4 py-2 rounded font-mono text-sm text-gray-500 break-all"},_e={class:"grid grid-cols-1 md:grid-cols-2 gap-4"},ve={class:"flex items-center"},ke={class:"ml-2 text-sm text-gray-600"},Se={__name:"ApiTokenManager",props:{tokens:Array,availablePermissions:Array,defaultPermissions:Array},setup(d){const r=x({name:"",permissions:d.defaultPermissions}),m=x({permissions:[]}),u=x({}),v=b(!1),f=b(null),_=b(null),j=()=>{r.post(route("api-tokens.store"),{preserveScroll:!0,onSuccess:()=>{v.value=!0,r.reset()}})},F=p=>{m.permissions=p.abilities,f.value=p},V=()=>{m.put(route("api-tokens.update",f.value),{preserveScroll:!0,preserveState:!0,onSuccess:()=>f.value=null})},D=p=>{_.value=p},M=()=>{u.delete(route("api-tokens.destroy",_.value),{preserveScroll:!0,preserveState:!0,onSuccess:()=>_.value=null})};return(p,l)=>(i(),c("div",null,[o(Y,{onSubmitted:j},{title:e(()=>[n(" Create API Token ")]),description:e(()=>[n(" API tokens allow third-party services to authenticate with our application on your behalf. ")]),form:e(()=>[t("div",ee,[o(T,{for:"name",value:"Name"}),o(L,{id:"name",modelValue:a(r).name,"onUpdate:modelValue":l[0]||(l[0]=s=>a(r).name=s),type:"text",class:"mt-1 block w-full",autofocus:""},null,8,["modelValue"]),o(z,{message:a(r).errors.name,class:"mt-2"},null,8,["message"])]),d.availablePermissions.length>0?(i(),c("div",se,[o(T,{for:"permissions",value:"Permissions"}),t("div",te,[(i(!0),c(w,null,$(d.availablePermissions,s=>(i(),c("div",{key:s},[t("label",oe,[o(B,{checked:a(r).permissions,"onUpdate:checked":l[1]||(l[1]=k=>a(r).permissions=k),value:s},null,8,["checked","value"]),t("span",le,h(s),1)])]))),128))])])):g("",!0)]),actions:e(()=>[o(U,{on:a(r).recentlySuccessful,class:"mr-3"},{default:e(()=>[n(" Created. ")]),_:1},8,["on"]),o(I,{class:C({"opacity-25":a(r).processing}),disabled:a(r).processing},{default:e(()=>[n(" Create ")]),_:1},8,["class","disabled"])]),_:1}),d.tokens.length>0?(i(),c("div",ne,[o(q),t("div",ae,[o(E,null,{title:e(()=>[n(" Manage API Tokens ")]),description:e(()=>[n(" You may delete any of your existing tokens if they are no longer needed. ")]),content:e(()=>[t("div",ie,[(i(!0),c(w,null,$(d.tokens,s=>(i(),c("div",{key:s.id,class:"flex items-center justify-between"},[t("div",re,h(s.name),1),t("div",ce,[s.last_used_ago?(i(),c("div",de," Last used "+h(s.last_used_ago),1)):g("",!0),d.availablePermissions.length>0?(i(),c("button",{key:1,class:"cursor-pointer ml-6 text-sm text-gray-400 underline",onClick:k=>F(s)}," Permissions ",8,me)):g("",!0),t("button",{class:"cursor-pointer ml-6 text-sm text-red-500",onClick:k=>D(s)}," Delete ",8,ue)])]))),128))])]),_:1})])])):g("",!0),o(S,{show:v.value,onClose:l[3]||(l[3]=s=>v.value=!1)},{title:e(()=>[n(" API Token ")]),content:e(()=>[pe,p.$page.props.jetstream.flash.token?(i(),c("div",fe,h(p.$page.props.jetstream.flash.token),1)):g("",!0)]),footer:e(()=>[o(A,{onClick:l[2]||(l[2]=s=>v.value=!1)},{default:e(()=>[n(" Close ")]),_:1})]),_:1},8,["show"]),o(S,{show:f.value!=null,onClose:l[6]||(l[6]=s=>f.value=null)},{title:e(()=>[n(" API Token Permissions ")]),content:e(()=>[t("div",_e,[(i(!0),c(w,null,$(d.availablePermissions,s=>(i(),c("div",{key:s},[t("label",ve,[o(B,{checked:a(m).permissions,"onUpdate:checked":l[4]||(l[4]=k=>a(m).permissions=k),value:s},null,8,["checked","value"]),t("span",ke,h(s),1)])]))),128))])]),footer:e(()=>[o(A,{onClick:l[5]||(l[5]=s=>f.value=null)},{default:e(()=>[n(" Cancel ")]),_:1}),o(I,{class:C(["ml-3",{"opacity-25":a(m).processing}]),disabled:a(m).processing,onClick:V},{default:e(()=>[n(" Save ")]),_:1},8,["class","disabled"])]),_:1},8,["show"]),o(Z,{show:_.value!=null,onClose:l[8]||(l[8]=s=>_.value=null)},{title:e(()=>[n(" Delete API Token ")]),content:e(()=>[n(" Are you sure you would like to delete this API token? ")]),footer:e(()=>[o(A,{onClick:l[7]||(l[7]=s=>_.value=null)},{default:e(()=>[n(" Cancel ")]),_:1}),o(H,{class:C(["ml-3",{"opacity-25":a(u).processing}]),disabled:a(u).processing,onClick:M},{default:e(()=>[n(" Delete ")]),_:1},8,["class","disabled"])]),_:1},8,["show"])]))}};export{Se as default};
