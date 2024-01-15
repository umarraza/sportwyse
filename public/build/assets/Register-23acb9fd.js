import{T as g,o as c,e as f,b as e,u as t,a as o,w as n,F as p,Z as w,k as h,_ as l,h as m,i,g as u,f as v,l as y,n as b}from"./app-365665b1.js";import{A as V}from"./AuthenticationCard-5623108a.js";import{_ as k}from"./AuthenticationCardLogo-aa171dbe.js";import{_ as x}from"./Checkbox-2badec3f.js";import{_ as $}from"./PrimaryButton-7b5caa1b.js";import"./_plugin-vue_export-helper-c27b6911.js";const q={class:"relative sm:flex sm:justify-center sm:items-center min-h-screen bg-dots-darker bg-center bg-gray-100 dark:bg-dots-lighter dark:bg-gray-900 selection:bg-red-500 selection:text-white"},N={class:"card-body"},P=["onSubmit"],U={class:"mt-4"},C={class:"mt-4"},F={class:"mt-4"},A={class:"mt-4"},T={key:0,class:"mt-4"},j={class:"flex items-center"},B={class:"ml-2"},R=["href"],S=["href"],E={class:"flex items-center justify-end mt-4"},H={__name:"Register",setup(z){const s=g({first_name:"",last_name:"",email:"",password:"",password_confirmation:"",terms:!1}),_=()=>{s.post(route("register"),{onFinish:()=>s.reset("password","password_confirmation")})};return(d,a)=>(c(),f(p,null,[e(t(w),{title:"Register"}),o("div",q,[e(V,null,{logo:n(()=>[e(k)]),default:n(()=>[o("div",N,[o("form",{onSubmit:h(_,["prevent"])},[o("div",null,[e(l,{for:"first_name",value:"First Name"}),e(m,{id:"first_name",modelValue:t(s).first_name,"onUpdate:modelValue":a[0]||(a[0]=r=>t(s).first_name=r),type:"text",class:"mt-1 block w-full",required:"",autofocus:"",autocomplete:"first_name"},null,8,["modelValue"]),e(i,{class:"mt-2",message:t(s).errors.first_name},null,8,["message"])]),o("div",U,[e(l,{for:"last_name",value:"Last Name"}),e(m,{id:"last_name",modelValue:t(s).last_name,"onUpdate:modelValue":a[1]||(a[1]=r=>t(s).last_name=r),type:"text",class:"mt-1 block w-full",required:"",autofocus:"",autocomplete:"last_name"},null,8,["modelValue"]),e(i,{class:"mt-2",message:t(s).errors.last_name},null,8,["message"])]),o("div",C,[e(l,{for:"email",value:"Email"}),e(m,{id:"email",modelValue:t(s).email,"onUpdate:modelValue":a[2]||(a[2]=r=>t(s).email=r),type:"email",class:"mt-1 block w-full",required:"",autocomplete:"username"},null,8,["modelValue"]),e(i,{class:"mt-2",message:t(s).errors.email},null,8,["message"])]),o("div",F,[e(l,{for:"password",value:"Password"}),e(m,{id:"password",modelValue:t(s).password,"onUpdate:modelValue":a[3]||(a[3]=r=>t(s).password=r),type:"password",class:"mt-1 block w-full",required:"",autocomplete:"new-password"},null,8,["modelValue"]),e(i,{class:"mt-2",message:t(s).errors.password},null,8,["message"])]),o("div",A,[e(l,{for:"password_confirmation",value:"Confirm Password"}),e(m,{id:"password_confirmation",modelValue:t(s).password_confirmation,"onUpdate:modelValue":a[4]||(a[4]=r=>t(s).password_confirmation=r),type:"password",class:"mt-1 block w-full",required:"",autocomplete:"new-password"},null,8,["modelValue"]),e(i,{class:"mt-2",message:t(s).errors.password_confirmation},null,8,["message"])]),d.$page.props.jetstream.hasTermsAndPrivacyPolicyFeature?(c(),f("div",T,[e(l,{for:"terms"},{default:n(()=>[o("div",j,[e(x,{id:"terms",checked:t(s).terms,"onUpdate:checked":a[5]||(a[5]=r=>t(s).terms=r),name:"terms",required:""},null,8,["checked"]),o("div",B,[u(" I agree to the "),o("a",{target:"_blank",href:d.route("terms.show"),class:"underline text-sm text-gray-600 hover:text-gray-900 rounded-md focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500"},"Terms of Service",8,R),u(" and "),o("a",{target:"_blank",href:d.route("policy.show"),class:"underline text-sm text-gray-600 hover:text-gray-900 rounded-md focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500"},"Privacy Policy",8,S)])]),e(i,{class:"mt-2",message:t(s).errors.terms},null,8,["message"])]),_:1})])):v("",!0),o("div",E,[e(t(y),{href:d.route("login"),class:"underline text-sm text-gray-600 hover:text-gray-900 rounded-md focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500"},{default:n(()=>[u(" Already registered? ")]),_:1},8,["href"]),e($,{class:b(["ml-4",{"opacity-25":t(s).processing}]),disabled:t(s).processing},{default:n(()=>[u(" Register ")]),_:1},8,["class","disabled"])])],40,P)])]),_:1})])],64))}};export{H as default};