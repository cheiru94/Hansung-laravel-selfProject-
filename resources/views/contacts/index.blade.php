<x-app-layout>
  <x-slot name="header">
      <h2 class="font-semibold text-xl text-gray-800 leading-tight">
          커뮤니티
      </h2>
  </x-slot>

  <div class="py-12">
      <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">

        {{-- 게시판 내용 --}}
        <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
          <div class="p-6 text-gray-900">

            <button class=" text-white bg-indigo-500 border-0 py-2 px-8 focus:outline-none hover:bg-indigo-600 rounded text-lg">
              <a class="text" href="{{route('contacts.create')}}" class="text-blue-500">신규등록</a>
            </button><br>

            <div class="w-full flex justify-center">
              <form class="mb-8" action="{{route('contacts.index')}}" method="get"> {{-- 검색된 결과로 다시 index로 팅구자 --}}
                <input type="text" name="search" placeholder="검색" class="w-[350px]">
                <button class=" text-white bg-indigo-500 border-0 py-2 px-8 focus:outline-none hover:bg-indigo-600 rounded text-lg">검색하기</button>
              </form>
            </div>
              
            
              {{-- 테이블 --}}
              <div class="lg:w-3/3 w-full mx-auto overflow-auto">
                <table class="table-auto w-full text-left whitespace-no-wrap">
                  {{-- 테이블 head --}}
                  <thead>
                    <tr class="text-center">
                      <th class="px-4 py-3 title-font tracking-wider font-medium text-gray-900 text-sm bg-gray-100">No.</th>
                      <th class="px-4 py-3 title-font tracking-wider font-medium text-gray-900 text-sm bg-gray-100">성명</th>
                      <th class="px-4 py-3 title-font tracking-wider font-medium text-gray-900 text-sm bg-gray-100">문의사항</th>
                      <th class="px-4 py-3 title-font tracking-wider font-medium text-gray-900 text-sm bg-gray-100">지역</th>
                      <th class="px-4 py-3 title-font tracking-wider font-medium text-gray-900 text-sm bg-gray-100">등록일</th>
                    </tr>
                  </thead>
                  {{-- 테이블 내용 --}}
                  <tbody>
                    @foreach ($contacts as $contact)
                        <tr class="text-center">
                          <td class="border-t-2 border-gray-200 px-4 py-3">{{$contact->id}}</td>
                          <td class="border-t-2 border-gray-200 px-4 py-3">{{$contact->name}}</td>
                          <td class="border-t-2 border-gray-200 px-4 py-3 text-lg text-gray-900"><a href="{{ route('contacts.show' ,['id'=>$contact->id])}}">{{$contact->title}}</a></td>
                          <td class="border-t-2 border-gray-200 px-4 py-3 ">
                            @php
                              $region = '';
                              switch ($contact->region) {
                                case 0:
                                  $region = '남구';
                                  break;
                                case 1:
                                  $region = '중구';
                                  break;
                                case 2:
                                  $region = '북구';
                                  break;
                                case 3:
                                  $region = '동구';
                                  break;
                                case 4:
                                  $region = '울주군';
                                  break;
                                case 5:
                                  $region = '그 외 지역';
                                  break;
                              }
                            @endphp
                            {{ $region }}  
                          </td>
                          <td class="border-t-2 border-gray-200 px-4 py-3">{{$contact->created_at}}</td>
                        </tr>
                    @endforeach
                  </tbody>
                </table>
              </div>

              {{-- 페이지네이션 --}}
              <div class="mt-6 flex justify-center items-center">
                {{$contacts->links()}}
              </div>

            </div>
          </div>
      </div>
  </div>
</x-app-layout>
 