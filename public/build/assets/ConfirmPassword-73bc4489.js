import{T as d,d as m,o as c,e as u,b as e,u as a,Z as p,w as r,a as o,_ as f,g as _,h as w,n as g,f as b,k as h,F as x}from"./app-5970ba1c.js";import{A as v}from"./AuthenticationCard-9476d91d.js";import{_ as y}from"./AuthenticationCardLogo-ffb48cb2.js";import{_ as V}from"./PrimaryButton-95cf3c2b.js";import"./_plugin-vue_export-helper-c27b6911.js";const k=o("div",{class:"mb-4 text-sm text-gray-600"}," This is a secure area of the application. Please confirm your password before continuing. ",-1),C={class:"flex justify-end mt-4"},I={__name:"ConfirmPassword",setup($){const s=d({password:""}),t=m(null),i=()=>{s.post(route("password.confirm"),{onFinish:()=>{s.reset(),t.value.focus()}})};return(A,n)=>(c(),u(x,null,[e(a(p),{title:"Secure Area"}),e(v,null,{logo:r(()=>[e(y)]),default:r(()=>[k,o("form",{onSubmit:h(i,["prevent"])},[o("div",null,[e(f,{for:"password",value:"Password"}),e(_,{id:"password",ref_key:"passwordInput",ref:t,modelValue:a(s).password,"onUpdate:modelValue":n[0]||(n[0]=l=>a(s).password=l),type:"password",class:"mt-1 block w-full",required:"",autocomplete:"current-password",autofocus:""},null,8,["modelValue"]),e(w,{class:"mt-2",message:a(s).errors.password},null,8,["message"])]),o("div",C,[e(V,{class:g(["ml-4",{"opacity-25":a(s).processing}]),disabled:a(s).processing},{default:r(()=>[b(" Confirm ")]),_:1},8,["class","disabled"])])],32)]),_:1})],64))}};export{I as default};
