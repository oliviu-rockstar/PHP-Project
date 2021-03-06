<?php namespace App\Http\Requests;

use App\Http\Requests\Request;

class ListingUpdate extends Request {

	protected $id;

	/**
	 * Determine if the user is authorized to make this request.
	 *
	 * @return bool
	 */
	public function authorize()
	{
		return true;
	}

	/**
	 * @return mixed
	 */
	public function getId()
	{
		return $this->id;
	}

	/**
	 * @param mixed $id
	 */
	public function setId($id)
	{
		$this->id = $id;
	}

	/**
	 * Get the validation rules that apply to the request.
	 *
	 * @return array
	 */
	public function rules()
	{

		$rules = [
			'name' => 'sometimes|required',
			'description' => 'sometimes| required',
			'category_id' => 'sometimes|required',
			'user_id'	=> 'sometimes|required',
			'lat' => 'sometimes|required',
			'long' => 'sometimes|required',
			'addon' => 'sometimes|required|array'
		];
		$request = $this->request->all();

		if($this->request->has('addon') && is_array($request['addon'])) {
			for($i=0; $i<count($request['addon']);$i++) {
				$rules["addon.{$i}.id"] = 'sometimes|required';
				$rules["addon.{$i}.price"] = 'sometimes|required';
				$rules["addon.{$i}.description"] = 'sometimes|required';
			}
		}

		return $rules;

	}

}
