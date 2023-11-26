<x-hansung-layout >

    {{-- 아래 여백 --}}
    <div class="h-[80px]"> </div>

  <div class="Contact w-[1440px] h-[auto] p-2.5  mb-10 bg-white flex-col justify-start items-center gap-2.5 inline-flex ">
    <div class="TitleDiv w-[1360px] h-[75px] mb-3 p-2.5 bg-white flex-col justify-start items-start gap-2.5 flex ">
      <div class="Title w-[1080px]  grow shrink basis-0 text-black text-[51px] font-normal font-['Inter']">{{$post->title}}</div>
    </div>
    <div class="Navbar w-[1366px] h-[68px] px-[35px] py-2.5 bg-slate-50 border-t-2 border-b-2 border-neutral-200 justify-start items-center gap-[29px] inline-flex">
      <div class="Author w-16 text-black text-[21px] font-bold font-['Inter']">작성자</div>
      <div class="Authorcontent w-16 text-black text-[21px] font-normal font-['Inter']">관리자</div>
      <div class=" w-[1px] h-[25px]  border-2 border-zinc-400"></div>
      <div class="Date w-[89px] text-black text-[21px] font-bold font-['Inter']">작성일자</div>
      <div class="DateContent w-[235px] text-black text-[21px] font-normal font-['Inter']">{{$post->created_at}}</div>
    </div>
    <div class="Description w-[1363px] h-[auto] p-2.5 border-b-2">{{$post->content}}</div>
  </div>

 {{-- 댓글 --}}
  <section class="text-gray-600 px-2.5 body-font overflow-hidden mb-6">
    <div class="container px-5  {{-- mx-auto --}}">
      <div class="-my-8 divide-y-2 divide-gray-100">
        
        @foreach ($post->comments()->orderBy('created_at', 'desc')->get()  as $comment)
          <div class="py-8 flex flex-wrap md:flex-nowrap">
            <div class="md:w-40 md:mb-0 mb-6 flex-shrink-0 flex flex-col">
              <span class="font-semibold title-font text-gray-700">{{$comment->user->name}}</span>
              <span class="mt-1 text-gray-500 text-sm">{{$comment->created_at}}</span>
            </div>
            <div class="md:flex-grow">
              <p class="leading-relaxed">{{$comment->comment}}</p>
            </div>
          </div>
        @endforeach
      
      </div>
    </div>
  </section>

  {{-- 아래 여백 --}}
  <div class="h-[50px]"> </div>


</x-hansung-layout>

