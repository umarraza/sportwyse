import{S as w}from"./SectionTitle-ae02b87b.js";import{o as y,e as v,b as c,w as n,r as o,a as s,L as x,H as _,M as g,m as b,c as f,p as m,K as u,J as h,n as $,j as k,N as B}from"./app-7a8b179d.js";const S={class:"md:grid md:grid-cols-3 md:gap-6"},C={class:"mt-5 md:mt-0 md:col-span-2"},E={class:"px-4 py-5 sm:p-6 bg-white shadow sm:rounded-lg"},J={__name:"ActionSection",setup(e){return(a,t)=>(y(),v("div",S,[c(w,null,{title:n(()=>[o(a.$slots,"title")]),description:n(()=>[o(a.$slots,"description")]),_:3}),s("div",C,[s("div",E,[o(a.$slots,"content")])])]))}},W={class:"fixed inset-0 overflow-y-auto px-4 py-6 sm:px-0 z-50","scroll-region":""},M=s("div",{class:"absolute inset-0 bg-gray-500 opacity-75"},null,-1),N=[M],L={__name:"Modal",props:{show:{type:Boolean,default:!1},maxWidth:{type:String,default:"2xl"},closeable:{type:Boolean,default:!0}},emits:["close"],setup(e,{emit:a}){const t=e,i=a;x(()=>t.show,()=>{t.show?document.body.style.overflow="hidden":document.body.style.overflow=null});const l=()=>{t.closeable&&i("close")},d=r=>{r.key==="Escape"&&t.show&&l()};_(()=>document.addEventListener("keydown",d)),g(()=>{document.removeEventListener("keydown",d),document.body.style.overflow=null});const p=b(()=>({sm:"sm:max-w-sm",md:"sm:max-w-md",lg:"sm:max-w-lg",xl:"sm:max-w-xl","2xl":"sm:max-w-2xl"})[t.maxWidth]);return(r,D)=>(y(),f(B,{to:"body"},[c(u,{"leave-active-class":"duration-200"},{default:n(()=>[m(s("div",W,[c(u,{"enter-active-class":"ease-out duration-300","enter-from-class":"opacity-0","enter-to-class":"opacity-100","leave-active-class":"ease-in duration-200","leave-from-class":"opacity-100","leave-to-class":"opacity-0"},{default:n(()=>[m(s("div",{class:"fixed inset-0 transform transition-all",onClick:l},N,512),[[h,e.show]])]),_:1}),c(u,{"enter-active-class":"ease-out duration-300","enter-from-class":"opacity-0 translate-y-4 sm:translate-y-0 sm:scale-95","enter-to-class":"opacity-100 translate-y-0 sm:scale-100","leave-active-class":"ease-in duration-200","leave-from-class":"opacity-100 translate-y-0 sm:scale-100","leave-to-class":"opacity-0 translate-y-4 sm:translate-y-0 sm:scale-95"},{default:n(()=>[m(s("div",{class:$(["mb-6 bg-white rounded-lg overflow-hidden shadow-xl transform transition-all sm:w-full sm:mx-auto",p.value])},[e.show?o(r.$slots,"default",{key:0}):k("",!0)],2),[[h,e.show]])]),_:3})],512),[[h,e.show]])]),_:3})]))}},T={class:"px-6 py-4"},V={class:"text-lg font-medium text-gray-900"},j={class:"mt-4 text-sm text-gray-600"},z={class:"flex flex-row justify-end px-6 py-4 bg-gray-100 text-right"},K={__name:"DialogModal",props:{show:{type:Boolean,default:!1},maxWidth:{type:String,default:"2xl"},closeable:{type:Boolean,default:!0}},emits:["close"],setup(e,{emit:a}){const t=a,i=()=>{t("close")};return(l,d)=>(y(),f(L,{show:e.show,"max-width":e.maxWidth,closeable:e.closeable,onClose:i},{default:n(()=>[s("div",T,[s("div",V,[o(l.$slots,"title")]),s("div",j,[o(l.$slots,"content")])]),s("div",z,[o(l.$slots,"footer")])]),_:3},8,["show","max-width","closeable"]))}};export{L as _,J as a,K as b};
