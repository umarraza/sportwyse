import{_ as c}from"./AppLayout-affc32e0.js";import p from"./DeleteUserForm-33f7f7b9.js";import l from"./LogoutOtherBrowserSessionsForm-25a53319.js";import{S as s}from"./SectionBorder-436fb2fd.js";import f from"./TwoFactorAuthenticationForm-1e9c5fb0.js";import u from"./UpdatePasswordForm-23e10703.js";import _ from"./UpdateProfileInformationForm-74dc6999.js";import{o,c as d,w as n,a as i,e as r,b as t,f as a,F as h}from"./app-ed6aa4ba.js";import"./Banner-e5179c1b.js";import"./DropdownLink-a3e05c10.js";import"./DialogModal-c7820c21.js";import"./SectionTitle-89d3844e.js";import"./_plugin-vue_export-helper-c27b6911.js";import"./DangerButton-c8770f55.js";import"./SecondaryButton-94de77ce.js";import"./ActionMessage-b72b32ff.js";import"./PrimaryButton-c60426c5.js";import"./FormSection-46ce95d4.js";const g=i("h2",{class:"font-semibold text-xl text-gray-800 leading-tight"}," Profile ",-1),$={class:"max-w-7xl mx-auto py-10 sm:px-6 lg:px-8"},w={key:0},k={key:1},y={key:2},z={__name:"Show",props:{confirmsTwoFactorAuthentication:Boolean,sessions:Array},setup(m){return(e,x)=>(o(),d(c,{title:"Profile"},{header:n(()=>[g]),default:n(()=>[i("div",null,[i("div",$,[e.$page.props.jetstream.canUpdateProfileInformation?(o(),r("div",w,[t(_,{user:e.$page.props.auth.user},null,8,["user"]),t(s)])):a("",!0),e.$page.props.jetstream.canUpdatePassword?(o(),r("div",k,[t(u,{class:"mt-10 sm:mt-0"}),t(s)])):a("",!0),e.$page.props.jetstream.canManageTwoFactorAuthentication?(o(),r("div",y,[t(f,{"requires-confirmation":m.confirmsTwoFactorAuthentication,class:"mt-10 sm:mt-0"},null,8,["requires-confirmation"]),t(s)])):a("",!0),t(l,{sessions:m.sessions,class:"mt-10 sm:mt-0"},null,8,["sessions"]),e.$page.props.jetstream.hasAccountDeletionFeatures?(o(),r(h,{key:3},[t(s),t(p,{class:"mt-10 sm:mt-0"})],64)):a("",!0)])])]),_:1}))}};export{z as default};